<?php
declare(strict_types=1);

class Dish {

    public int $_dishID;
    public string $_name;
    public float $_price;
    public string $_category;

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

        $stmt->execute(array($this->_dishID, $this->_name, $this->_price, $this->_category));

    }

    static function searchDishes(PDO $db, string $name, array $filters) {

        $query = "SELECT * FROM Dish WHERE name LIKE '";
        $query .= $name . "%'";

        if ($filters) {

            $query .= " AND (category = '" . $filters[0] . "'";

            for ($i = 1; $i < count($filters); $i++) {
                $query .= " OR category = '" . $filters[$i] . "'";
            }

            $query .= ")";
        }
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        
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
