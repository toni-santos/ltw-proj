<?php
declare(strict_types=1);

class User {
        
    private int $userID;
    private string $username;
    private string $email;
    private string $password;
    private ?string $address = NULL;
    private ?int $phoneNumber = NULL;
    private ?string $profilePic = NULL;

    public function __construct($userID, $username, $email, $password, $address, $phoneNumber, $profilePic) {
        
        $this->$userID = $userID;
        $this->$username = $username;
        $this->$email = $email;
        $this->$password = hash('sha256', $username);
        $this->$address = $address;
        $this->$phoneNumber = $phoneNumber;
        $this->$profilePic = $profilePic;

    }

    public function add_to_db($db) {

        $stmt = $db->prepare('
            INSERT INTO User
            VALUES(?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute(array ( $this->userID, $this->username, $this->email, $this->password, $this->address, $this->phoneNumber, $this->profilePic ) );

    }

    public function save_to_db($db) {

        $stmt = $db->prepare('
            UPDATE User SET username = ?, password = ?
            WHERE userID = ?
        ');

        $stmt->execute( array( $this->username,  $this->email, $this->password, $this->userID ) );

    }

    function name() {
        return $this->username;
      }

    static function getUserWithPassword(PDO $db, string $email, string $password) : ?User {
        $stmt = $db->prepare('
          SELECT userID, username, email, password, address, phoneNumber, profilePic
          FROM User 
          WHERE lower(email) = ? AND password = ?
        ');
  
        $stmt->execute(array(strtolower($email), sha1($password)));
    
        if ($user = $stmt->fetch()) {
          return new User(
            $user['userID'],
            $user['username'],
            $user['email'],
            $user['password'],
            $user['address'],
            $user['phoneNumber'],
            $user['profilePic']
          );
        } else return null;
      }
}

?>