<?php
declare(strict_types = 1);

class Restaurant {

    private int $_restaurantID;
    private string $_name;
    private string $_location;
    private string $_category;
    private ?string $_opening_time;
    private ?string $_closing_time;

    public function __construct($restaurantID,$name, $location, $category, $opening_time = NULL, $closing_time = NULL) {
        $this->_restaurantID = $restaurantID;
        $this->_name = $name;
        $this->_location = $location;
        $this->_category = $category;
        $this->_opening_time = $opening_time;
        $this->_closing_time = $closing_time;
    }

    public function getRestaurantID() { return $this->_restaurantID; }
    public function getName() { return $this->_name; }
    public function getLocation() { return $this->_location; }
    public function getCategory() { return $this->_category; }

    public function add_to_db(PDO $db) {

        $stmt = $db->prepare('
            INSERT INTO Restaurant
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute(array($this->_restaurantID, $this->_name, $this->_location, $this->_category, $this->_opening_time, $this->_closing_time));
    
    }

    static function searchRestaurants(PDO $db, string $name) {
        $stmt = $db->prepare('
            SELECT *
            FROM Restaurant
            WHERE name LIKE ?            
        ');

        $stmt->execute(array($name . "%"));

        $restaurants = array();
        while ($restaurant = $stmt->fetch(PDO::FETCH_OBJ)) {

            $restaurants[] = new Restaurant(
                $restaurant->restaurantID,
                $restaurant->name,
                $restaurant->location,
                $restaurant->category,
                $restaurant->opening_time,
                $restaurant->closing_time
            );
        }

        return $restaurants;
    }
}

?>