<?php
declare(strict_types = 1);

require_once("../database/db_loader.php");

class Restaurant {

    public ?int $restaurantID;
    public string $name;
    public string $location;
    public ?string $opening_time;
    public ?string $closing_time;

    public function __construct(int $restaurantID, string $name, string $location, string $opening_time, string $closing_time) {
        $this->restaurantID = $restaurantID;
        $this->name = $name;
        $this->location = $location;
        $this->opening_time = $opening_time;
        $this->closing_time = $closing_time;
    }

    public function getRestaurants(PDO $db, int $count) {
        $stmt = $db->prepare('SELECT restaurantID, name FROM Restaurant LIMIT ?');
        $stmt->execute(array($count));
    
        $restaurants = array();
        while ($restaurant = $stmt->fetch()) {
            $restaurants[] = new Restaurant(
                $restaurant['restaurantID'], 
                $restaurant['name'],
                $restaurant ['location'],
                $restaurant ['opening_time'],
                $restaurant ['closing_time']
            );
        }
    
        return $restaurants;
    }

    public function getRestaurant(PDO $db, int $restaurantID) : Restaurant {
        $stmt = $db->prepare('SELECT restaurantID, name FROM Restaurant WHERE restaurantID = ?');
        $stmt->execute(array($restaurantID));
    
        $restaurant= $stmt->fetch();
    
        return new Restaurant(
            $restaurant['restaurantID'], 
            $restaurant['name'],
            $restaurant ['location'],
            $restaurant ['opening_time'],
            $restaurant ['closing_time']
        );
    }


    public function add_to_db(PDO $db) {

        $stmt = $db->prepare('
            INSERT INTO Restaurant
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute(array($this->restaurantID, $this->name, $this->location, $this->opening_time, $this->closing_time));
    
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
}

?>