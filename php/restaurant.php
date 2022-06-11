<?php
declare(strict_types = 1);

require_once("../database/db_loader.php");
require_once("review.php");

class Restaurant {

    public ?int $restaurantID;
    public ?float $rating;
    public ?string $name;
    public ?string $location;
    public ?string $opening_time;
    public ?string $closing_time;
    public ?array $categories = null;
    public ?array $reviews = null;
    public ?array $menus = null;
    public ?int $ownerID;

    public function __construct(?int $restaurantID, ?string $name, ?string $location, ?string $opening_time, ?string $closing_time) {
        $this->restaurantID = $restaurantID;
        $this->name = $name;
        $this->location = $location;
        $this->opening_time = $opening_time;
        $this->closing_time = $closing_time;
        $this->rating = 0;
    }

    static function getRestaurants(PDO $db, int $count) {
        $stmt = $db->prepare('SELECT * FROM Restaurant LIMIT ?');
        $stmt->execute(array($count));
    
        $restaurants = array();
        while ($restaurant = $stmt->fetch()) {
            $restaurants[] = new Restaurant(
                $restaurant['restaurantID'], 
                $restaurant['name'],
                $restaurant['location'],
                $restaurant['opening_time'],
                $restaurant['closing_time']
            );
        }
    
        return $restaurants;
    }

    static function getRestaurant(PDO $db, int $restaurantID) : Restaurant {
        $stmt = $db->prepare('SELECT * FROM Restaurant WHERE restaurantID = ?');
        $stmt->execute(array($restaurantID));
    
        $restaurant= $stmt->fetch();
    
        return new Restaurant(
            $restaurant['restaurantID'], 
            $restaurant['name'],
            $restaurant['location'],
            $restaurant['opening_time'],
            $restaurant['closing_time']
        );
    }


    public function add_to_db(PDO $db) {

        $stmt = $db->prepare('
            INSERT INTO Restaurant
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute(array($this->restaurantID, $this->name, $this->location, $this->opening_time, $this->closing_time));
        $this->restaurantID = intval($db->lastInsertId('Restaurant'));
    }

    static function searchRestaurants(PDO $db, string $name, array $filters) {

        $query = "SELECT DISTINCT Restaurant.restaurantID, name, location, opening_time, closing_time FROM Restaurant";

        if ($filters) {

            $query .= "
            JOIN RestaurantCategory
            ON RestaurantCategory.restaurantID = Restaurant.restaurantID
            AND (categoryName = '" . $filters[0] . "'";

            for ($i = 1; $i < count($filters); $i++) {
                $query .= " OR categoryName = '" . $filters[$i] . "'";
            }

            $query .= ")";

        }

        $query .= " WHERE name LIKE '";
        $query .= $name . "%'";

        $stmt = $db->prepare($query);
        $stmt->execute();

        $restaurants = array();
        while ($restaurant = $stmt->fetch(PDO::FETCH_OBJ)) {

            $restaurants[] = new Restaurant(
                $restaurant->restaurantID,
                $restaurant->name,
                $restaurant->location,
                $restaurant->opening_time,
                $restaurant->closing_time
            );
        }

        return $restaurants;
    }

    public function getRestaurantCategories(PDO $db) {

        $stmt = $db->prepare("SELECT categoryName FROM RestaurantCategory WHERE restaurantID = ?");
        $stmt->execute(array($this->restaurantID));

        $this->categories = $stmt->fetchAll();

    }

    public function getRestaurantReviews(PDO $db) {

        $stmt = $db->prepare("
        SELECT *
        FROM Review
        WHERE restaurantID = ?
        ");

        $stmt->execute(array($this->restaurantID));

        $reviews = array();
        while ($review = $stmt->fetch()) {
            $reviews[] = new Review(
                $review['restaurantID'],
                $review['reviewerID'],
                $review['message'],
                $review['rating']
            );
        }

        $this->reviews = $reviews;

    }

    public function setRestaurantRating(PDO $db) {
        $stmt = $db->prepare(
            'SELECT avg(rating)
            FROM Review WHERE
            restaurantID = ?;'
        );

        $stmt->execute(array($this->restaurantID));

        if ($rating = $stmt->fetch()) {
            $this->rating = $rating['avg(rating)'];
        }
    }

    static function getAllRestaurants(PDO $db) {
        $stmt = $db->prepare('SELECT * FROM Restaurant');
        $stmt->execute();
            
        $restaurants = array();
        while ($restaurant = $stmt->fetch(PDO::FETCH_OBJ)) {
            $restaurants[] = new Restaurant(
                $restaurant->restaurantID,
                $restaurant->name,
                $restaurant->location,
                $restaurant->opening_time,
                $restaurant->closing_time
            );
        }

        return $restaurants;
    }

    public function checkFavorite(int $userID) {
        $db = getDatabase();

        $stmt = $db->prepare('SELECT * FROM FavRestaurants WHERE restaurantID = ? AND userID = ?');
        $stmt->execute(array($this->restaurantID, $userID));

        if ($fav = $stmt->fetch()) {
            return true;
        } else {
            return false;
        }
    }

    public function getRestaurantOwner(PDO $db) {
        $stmt = $db->prepare('SELECT ownerID FROM RestOwner WHERE restaurantID = ?');
        $stmt->execute(array($this->restaurantID));
        
        if ($owner = $stmt->fetch(PDO::FETCH_OBJ)) {
            $this->ownerID = $owner->ownerID;
        }
    }

    public function getRestaurantMenus(PDO $db) {
        $stmt = $db->prepare('SELECT dishID FROM Menu WHERE restaurantID = ?');
        $stmt->execute(array($this->restaurantID));
        
        $dishesID = array();
        while ($id = $stmt->fetch(PDO::FETCH_OBJ)) {
          $dishesID[] = $id->dishID;
        }
        
        $dishes = array();
        foreach ($dishesID as $id)
          $dishes[] = Dish::getDish($db, intval($id));
        
    
        $this->menus = $dishes;
    }
}

?>