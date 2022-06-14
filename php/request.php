<?php
declare(strict_types = 1);

class Request {

    public int $requestID;
    public int $restaurantID;
    public int $userID;
    public string $state;
    public float $value;

    public function __construct(int $requestID, int $restaurantID, int $userID, string $state, float $value) {
        $this->requestID = $requestID;
        $this->restaurantID = $restaurantID;
        $this->userID = $userID;
        $this->state = $state;
        $this->value = $value;
    }

    public function getUsername(PDO $db) {
      $stmt = $db->prepare('
        SELECT username
        FROM User 
        WHERE userID = ?;
      ');
  
      $stmt->execute(array($this->userID));
      if ($user = $stmt->fetch()) {
        return $user['username'];
      }
    }

    public function getRestaurantName(PDO $db) {
        $stmt = $db->prepare('
            SELECT name
            FROM Restaurant 
            WHERE restaurantID = ?;
        ');
    
        $stmt->execute(array($this->restaurantID));
        if ($restaurant = $stmt->fetch()) {
            return $restaurant['name'];
        }
    }

    static function getRequest(PDO $db, int $requestID) {
        $stmt = $db->prepare('
            SELECT *
            FROM Request 
            WHERE requestID = ?;
        ');

        $stmt->execute(array($requestID));
        if ($req = $stmt->fetch(PDO::FETCH_OBJ)) {
            return new Request(
                $req->requestID,
                $req->restaurantID,
                $req->userID,
                $req->state,
                $req->value
            );
        }
    }

    public function updateRequestState(PDO $db, string $state) {
        $stmt = $db->prepare('
            UPDATE Request
            SET state = ?
            WHERE requestID = ?;
        ');
        
        $stmt->execute(array($state, $this->requestID));
        $this->state = $state;
    }

    public function removeRequest(PDO $db) {
        $stmt = $db->prepare('
            DELETE FROM Request
            WHERE requestID = ? AND restaurantID = ? AND userID = ?;
        ');
        
        $stmt->execute(array($this->requestID, $this->restaurantID, $this->userID));
    }
}

?>