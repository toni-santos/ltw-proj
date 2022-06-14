<?php

declare(strict_types=1);

require_once("review.php");
require_once("dish.php");
require_once("restaurant.php");

class User
{
  public ?int $userID = NULL;
  public ?string $username = NULL;
  public ?string $email = NULL;
  public ?string $address = NULL;
  public ?int $phoneNum = NULL;
  public ?array $reviews = null;
  public ?array $favRestaurants = null;
  public ?array $favDishes = null;

  public function __construct($userID, $username, $email, $address, $phoneNum) {

    $this->userID = $userID;
    $this->username = $username;
    $this->email = $email;
    $this->address = $address;
    $this->phoneNum = $phoneNum;
    
  }

  public function add_to_db(PDO $db)
  {
    $stmt = $db->prepare('
            INSERT INTO User
            VALUES(?, ?, ?, ?, ?)
        ');

    $stmt->execute(array($this->userID, $this->username, $this->email, $this->address, $this->phoneNum));
  }

  public function save_to_db(PDO $db)
  {
    $stmt = $db->prepare('
            UPDATE User SET username = ?, email = ?, address = ?, phoneNum = ?
            WHERE userID = ?
        ');

    $stmt->execute(array($this->username,  $this->email, $this->address, $this->phoneNum, $this->userID));
  }

  function name()
  {
    return $this->username;
  }

  static function getUserWithPassword(PDO $db, string $email, string $password): ?User
  {
    $stmt = $db->prepare('
      SELECT *
      FROM User 
      WHERE lower(email) = ?
    ');

    $stmt->execute(array(strtolower($email)));
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if (password_verify($password, $user->password)) {
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
    $user = $stmt->fetch();

    return new User(
      $user['userID'],
      $user['username'],
      $user['email'],
      $user['address'],
      $user['phoneNum']
    );
  }

  static function getUsers(PDO $db, int $count){
      $stmt = $db->prepare('SELECT * FROM User LIMIT ?');
      $stmt->execute(array($count));

      $users = array();
      while ($user = $stmt->fetch()) {
          $users[] = new User(
            $user['userID'],
            $user['username'],
            $user['email'],
            $user['address'],
            $user['phoneNum']
          );
      }
      return $users;
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
      FROM RestOwner
      WHERE ownerID = ?
    ');

    $stmt->execute(array($id));
    $restaurants = array();

    while ($restID = $stmt->fetch(PDO::FETCH_OBJ)) {
      $stmt2 = $db->prepare('
        SELECT *
        FROM Restaurant
        WHERE restaurantID = ?
      ');

      $stmt2->execute(array($restID->restaurantID));
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

  static function getAllUsers(PDO $db) {
    $stmt = $db->prepare('SELECT * FROM User');
    $stmt->execute();

    $users = array();
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

  public function getUserReviews(PDO $db) {
    $stmt = $db->prepare('
      SELECT *
      FROM Review
      WHERE reviewerID = ?;
    ');
    $stmt->execute(array($this->userID));

    $reviews = array();
    while ($review = $stmt->fetch(PDO::FETCH_OBJ)) {
      $reviews[] = new Review(
        $review->restaurantID,
        $review->reviewerID,
        $review->message,
        $review->rating
      );
    }

    $this->reviews = $reviews;
  }

  public function getFavoriteRestaurants(PDO $db) {
    $stmt = $db->prepare('
      SELECT restaurantID
      FROM FavRestaurants
      WHERE userID = ?;
    ');
    $stmt->execute(array($this->userID));

    $restaurantsID = array();
    while ($id = $stmt->fetch(PDO::FETCH_OBJ)) {
      $restaurantsID[] = $id->restaurantID;
    }

    $restaurants = array();
    foreach ($restaurantsID as $id)
      $restaurants[] = Restaurant::getRestaurant($db, intval($id));
    
      $this->favRestaurants = $restaurants;
  }

  public function getFavoriteDishes(PDO $db) {
    $stmt = $db->prepare('
      SELECT dishID
      FROM FavDishes
      WHERE userID = ?;
    ');
    $stmt->execute(array($this->userID));
    
    $dishesID = array();
    while ($id = $stmt->fetch(PDO::FETCH_OBJ)) {
      $dishesID[] = $id->dishID;
    }
    
    $dishes = array();
    foreach ($dishesID as $id)
      $dishes[] = Dish::getDish($db, intval($id));
    

    $this->favDishes = $dishes;
  }

  public function getUserRequests(PDO $db) {
    $stmt = $db->prepare('
      SELECT *
      FROM Request
      WHERE userID = ?;
    ');
    $stmt->execute(array($this->userID));

    $requests = array();
    while ($req = $stmt->fetch(PDO::FETCH_OBJ)) {
        $requests[] = new Request(
            $req->requestID,
            $req->restaurantID,
            $req->userID,
            $req->state,
            $req->value
        );
    }

    return $requests;
  }
}
