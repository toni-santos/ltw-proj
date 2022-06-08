<?php

declare(strict_types=1);

class User
{
  public ?int $userID = NULL;
  public ?string $username = NULL;
  public ?string $email = NULL;
  public ?string $address = NULL;
  public ?int $phoneNum = NULL;

  public function __construct($userID, $username, $email, $address, $phoneNum) {

    if (!isset($userID)) {
      $db = getDatabase();
      $stmt = $db->prepare("SELECT max(userID) FROM User");
      $stmt->execute();

      $this->userID = intval($stmt->fetch()['max(userID)']) + 1;
    } else $this->userID = $userID;

    $this->username = $username;
    $this->email = $email;
    $this->address = $address;
    $this->phoneNum = $phoneNum;
    
  }

  public function add_to_db($db)
  {
    $stmt = $db->prepare('
            INSERT INTO User
            VALUES(?, ?, ?, ?, ?)
        ');

    $stmt->execute(array($this->userID, $this->username, $this->email, $this->address, $this->phoneNum));
  }

  public function save_to_db($db)
  {
    $stmt = $db->prepare('
            UPDATE User SET username = ?, password = ?
            WHERE userID = ?
        ');

    $stmt->execute(array($this->username,  $this->email, $this->userID));
  }

  function name()
  {
    return $this->username;
  }

  static function getUserWithPassword(PDO $db, string $email, string $password): ?User
  {
    $stmt = $db->prepare('
      SELECT userID, username, email, address, phoneNum
      FROM User 
      WHERE lower(email) = ? AND password = ?
    ');

    $stmt->execute(array(strtolower($email), sha1($password)));
    if ($user = $stmt->fetch(PDO::FETCH_OBJ)) {
      return new User(
        $user->userID,
        $user->username,
        $user->email,
        $user->address,
        $user->phoneNum,
      );
    } else return null;
  }

  static function getUser(PDO $db, int $id): User
  {
    $stmt = $db->prepare('
      SELECT userID, username, email, address, phoneNum
      FROM User 
      WHERE userID = ?
    ');

    $stmt->execute(array($id));
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    return new User(
      $user->userID,
      $user->username,
      $user->email,
      $user->address,
      $user->phoneNum,
    );
  }

  static function searchUsers(PDO $db, string $name) {
    $stmt = $db->prepare('
      SELECT *
      FROM User
      WHERE username LIKE ?
    ');

    $stmt->execute(array($name . '%'));
    $users = array();

    $i = 0;
    while ($user = $stmt->fetch(PDO::FETCH_OBJ)) {
      $users[] = new User(
        $user->userID,
        $user->username,
        $user->email,
        $user->address,
        $user->phoneNum
      );
    }

    return $users;
  }

  static function getUserRestaurants(PDO $db, int $id): array {
    
    $stmt = $db->prepare('
      SELECT restaurantID
      FROM RestOwners
      WHERE userID = ?
    ');

    $stmt->execute(array($id));
    $restaurants = array();

    while ($restID = $stmt->fetch(PDO::FETCH_OBJ)) {
      $stmt2 = $db->prepare('
        SELECT *
        FROM Restaurant
        WHERE restaurantID = ?
      ');

      $stmt2->execute($restID->restaurantID);
      $restaurant = $stmt2->fetch(PDO::FETCH_OBJ);

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
