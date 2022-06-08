<?php
declare(strict_types = 1);

require_once("../database/db_loader.php");

class Restaurant {

    public ?int $_restaurantID;
    public string $_name;
    public string $_location;
    public ?string $_opening_time;
    public ?string $_closing_time;

    public function __construct($restaurantID = NULL, $name, $location, $opening_time = NULL, $closing_time = NULL) {

        if (!isset($restaurantID)) {
            $db = getDatabase();
            $stmt = $db->prepare("SELECT max(restaurantID) FROM Restaurant");
            $stmt->execute();

            $this->_restaurantID = intval($stmt->fetch()['max(restaurantID)']) + 1;
        } else $this->_restaurantID = $restaurantID;
        
        $this->_name = $name;
        $this->_location = $location;
        $this->_opening_time = $opening_time;
        $this->_closing_time = $closing_time;
    }

    public function add_to_db(PDO $db) {

        $stmt = $db->prepare('
            INSERT INTO Restaurant
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute(array($this->_restaurantID, $this->_name, $this->_location, $this->_opening_time, $this->_closing_time));
    
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