<?php
declare(strict_types=1);

class Dish {

    private int $_dishID;
    private string $_name;
    private float $_price;
    private ?string $_photo = NULL;
    private string $_category;

    public function __construct($dishID, $name, $price, $photo, $category) {
        $this->_dishID = $dish;
        $this->_name = $name;
        $this->_price = $price;
        $this->_photo = $photo;
        $this->_category = $category;
    }

    public function add_to_db(PDO $db) {

        $stmt = $db->prepare('
            INSERT INTO Dish
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute(array( $this->_dishID, $this->_name, $this->_price, $this->_photo, $this->_category ));

    }

}

?>