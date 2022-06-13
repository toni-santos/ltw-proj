<?php
declare(strict_types = 1);

require_once("../database/db_loader.php");

class Order {
    public int $userID;
    public int $dishID;
    public int $restaurantID;
    public int $amount;

    public function __construct(int $userID, int $dishID, int $restaurantID, int $amount) {
        $this->userID = $userID;
        $this->dishID = $dishID;
        $this->restaurantID = $restaurantID;
        $this->amount = $amount;
    }

    public function add_to_db(PDO $db) {
        $stmt = $db->prepare('
            INSERT INTO RequestItem
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute(array($this->restaurantID, $this->userID, $this->dishID, $this->amount));
    }

    static function getOrderByUser(PDO $db, int $userID){
        $stmt = $db->prepare('
            SELECT *
            FROM RequestItem
            WHERE userID = ?;
        ');
        $stmt->execute(array($userID));
        
        $items = array();
        while ($ri = $stmt->fetch(PDO::FETCH_OBJ)) {
            $items[] = new Order(
                $ri->userID,
                $ri->dishID,
                $ri->restaurantID,
                $ri->amount
            );
        }

        return $items;
    }

    static function getOrderByRestaurant(PDO $db, int $restaurantID){
        $stmt = $db->prepare('
            SELECT *
            FROM RequestItem
            WHERE restaurantID = ?
        ');
        $stmt->execute(array($restaurantID));
        
        $items = array();
        while ($ri = $stmt->fetch(PDO::FETCH_OBJ)) {
            $items[] = new Order(
                $ri->userID,
                $ri->dishID,
                $ri->restaurantID,
                $ri->amount
            );
        }

        return $items;
    }

    static function getOrderByDish(PDO $db, int $dishID) {
        $stmt = $db->prepare('
            SELECT *
            FROM RequestItem
            WHERE dishID = ?
        ');
        $stmt->execute(array($dishID));
        
        if ($ri = $stmt->fetch(PDO::FETCH_OBJ)) {
            return new Order(
                $ri->userID,
                $ri->dishID,
                $ri->restaurantID,
                $ri->amount
            );
        }
    }

    public function increaseOrderAmount(PDO $db) {
        $stmt = $db->prepare('
            UPDATE RequestItem
            SET amount = ?
            WHERE restaurantID = ? AND userID = ? AND dishID = ?
        ');
        $stmt->execute(array($this->amount + 1, $this->restaurantID, $this->userID, $this->dishID));
    }
}
?>