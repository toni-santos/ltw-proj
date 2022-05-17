<?php
declare(strict_types = 1);

class Restaurant {

    private int $_restaurantID;
    private string $_name;
    private string $_location;
    private string $_category;

    public function __construct($restaurantID,$name, $location, $category) {
        $this->_restaurantID = $restaurantID;
        $this->_name = $name;
        $this->_location = $location;
        $this->_category = $category;
    }

    public function getRestaurantID() { return $_restaurantID; }
    public function getName() { return $_name; }
    public function getLocation() { return $_location; }
    public function getCategory() { return $_category; }

    public function add_to_db(PDO $db) {

        $stmt = $db->prepare('
            INSERT INTO Restaurant
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute(array( $this->_restaurantID, $this->_name, $this->_location, $this->_category ));
    
    }
}

?>