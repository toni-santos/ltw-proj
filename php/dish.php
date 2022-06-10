<?php
declare(strict_types=1);

class Dish {

    public ?int $dishID;
    public string $name;
    public float $price;
    public string $category;

    public function __construct($dishID, $name, $price, $category) {
        if (!isset($dishID)) {
            $db = getDatabase();
            $stmt = $db->prepare("SELECT max(dishID) FROM Dish");
            $stmt->execute();

            $this->dishID = intval($stmt->fetch()['max(dishID)']) + 1;
        } else $this->dishID = $dishID;
        
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    public function add_to_db(PDO $db) {

        $stmt = $db->prepare('
            INSERT INTO Dish
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute(array($this->dishID, $this->name, $this->price, $this->category));

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

    static function getDishes(PDO $db, int $count) {
        $stmt = $db->prepare('SELECT * FROM Dish LIMIT ?');
        $stmt->execute(array($count));
    
        $dishes = array();
        while ($dish = $stmt->fetch()) {
            $dishes[] = new Dish(
                $dish['dishID'], 
                $dish['name'],
                $dish['price'],
                $dish['category']
            );
        }
    
        return $dishes;
    }
    
    public function getAssociatedRestaurant() {

        $db = getDatabase();

        $stmt = $db->prepare("SELECT restaurantID FROM Menu WHERE dishID = ?");
        $stmt->execute(array($this->_dishID));

        $restaurantID = $stmt->fetch()['restaurantID'];

        $stmt2 = $db->prepare("SELECT name FROM Restaurant WHERE restaurantID = ?");
        $stmt2->execute(array($restaurantID));

        return $stmt2->fetch()['name'];

    }

}
