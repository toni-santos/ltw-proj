<?php
declare(strict_types = 1);

class Restaurant {

    public int $_restaurantID;
    public string $_name;
    public string $_location;
    public ?string $_opening_time;
    public ?string $_closing_time;

    public function __construct($restaurantID, $name, $location, $opening_time = NULL, $closing_time = NULL) {
        $this->_restaurantID = $restaurantID;
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