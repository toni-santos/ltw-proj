<?php

declare(strict_types=1);

class User
{

  public ?int $userID = NULL;
  public ?string $username = NULL;
  public ?string $email = NULL;
  public ?string $address = NULL;
  public ?int $phoneNum = NULL;
  public ?string $profilePic = NULL;

  public function __construct($userID, $username, $email, $address, $phoneNum, $profilePic)
  {
    $this->userID = $userID;
    $this->username = $username;
    $this->email = $email;
    $this->address = $address;
    $this->phoneNum = $phoneNum;
    $this->profilePic = $profilePic;
  }

  public function add_to_db($db)
  {
    $stmt = $db->prepare('
            INSERT INTO User
            VALUES(?, ?, ?, ?, ?, ?)
        ');

    $stmt->execute(array($this->userID, $this->username, $this->email, $this->password, $this->address, $this->phoneNum, $this->profilePic));
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
      SELECT userID, username, email, address, phoneNum, profilePic 
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
        $user->profilePic
      );
    } else return null;
  }

  static function getUser(PDO $db, int $id): User
  {
    $stmt = $db->prepare('
      SELECT userID, username, email, address, phoneNum, profilePic
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
      $user->profilePic
    );
  }
}
