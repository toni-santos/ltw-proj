<?php
declare(strict_types=1);

class Dish {

    private int $_dishID;
    private string $_name;
    private float $_price;
    private string $_category;

    public function __construct($dishID, $name, $price, $category) {
        $this->_dishID = $dishID;
        $this->_name = $name;
        $this->_price = $price;
        $this->_category = $category;
    }

    public function add_to_db(PDO $db) {

        $stmt = $db->prepare('
            INSERT INTO Dish
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute(array( $this->_dishID, $this->_name, $this->_price, $this->_category ));

    }

    static function searchDishes(PDO $db, string $name) {
        $stmt = $db->prepare('
            SELECT *
            FROM Dish
            WHERE name LIKE ?
        ');

        $stmt->execute(array($name . '%'));
        $dishes = array();

        while ($dish = $stmt->fetch(PDO::FETCH_OBJ)) {
            $dishes[] = new Dish(
                $dish->dishID,
                $dish->name,
                $dish->price,
                $dish->category
            );
        }

        return $dishes;
    }

}

?>