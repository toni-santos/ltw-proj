<?php
declare(strict_types=1);

class Dish {

    public ?int $_dishID;
    public string $_name;
    public float $_price;
    public string $_category;
    public ?string $_restaurant = NULL;

    public function __construct(?int $dishID, string $name, float $price, string $category) {
       
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
        print_r($this);
        $stmt->execute(array($this->_dishID, $this->_name, $this->_price, $this->_category));
        $this->_dishID = intval($db->lastInsertId('Dish'));
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

    static function getDish(PDO $db, int $id) {
        $stmt = $db->prepare('SELECT * FROM Dish WHERE dishID = ?');
        $stmt->execute(array($id));
    
        if ($dish = $stmt->fetch()) {
            return new Dish(
                $dish['dishID'], 
                $dish['name'],
                $dish['price'],
                $dish['category']
            );
        }
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
    
    public function getAssociatedRestaurant(PDO $db) {
        $stmt = $db->prepare("SELECT restaurantID FROM Menu WHERE dishID = ?");
        $stmt->execute(array($this->_dishID));

        $restaurantID = $stmt->fetch()['restaurantID'];

        $stmt2 = $db->prepare("SELECT name FROM Restaurant WHERE restaurantID = ?");
        $stmt2->execute(array($restaurantID));

        $this->_restaurant = $stmt2->fetch()['name'];

    }

    static function getAllDishes(PDO $db) {
        $stmt = $db->prepare('SELECT * FROM Dish');
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

    public function checkFavorite(int $userID) {
        $db = getDatabase();

        $stmt = $db->prepare('SELECT * FROM FavDishes WHERE dishID = ? AND userID = ?');
        $stmt->execute(array($this->_dishID, $userID));

        if ($fav = $stmt->fetch()) {
            return true;
        } else {
            return false;
        }
    }

}
