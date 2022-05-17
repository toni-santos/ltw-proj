<?php
declare(strict_types=1);

class User {
        
    private int $_userID;
    private string $_username;
    private string $_password;
    private ?string $_address = NULL;
    private ?int $_phoneNumber = NULL;
    private ?string $_profilePic = NULL;

    public function __construct($userID, $username, $password, $address, $phoneNumber, $profilePic) {
        
        $this->$_userID = $userID;
        $this->$_username = $username;
        $this->$_password = hash('sha256', $username);
        $this->$_address = $address;
        $this->$_phoneNumber = $phoneNumber;
        $this->$_profilePic = $profilePic;

    }

    public function add_to_db($db) {

        $stmt = $db->prepare('
            INSERT INTO User
            VALUES(?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute(array ( $this->_userID, $this->_username, $this->_password, $this->_address, $this->_phoneNumber, $this->_profilePic ) );

    }

    public function save_to_db($db) {

        $stmt = $db->prepare('
            UPDATE User SET username = ?, password = ?
            WHERE userID = ?
        ');

        $stmt->execute( array( $this->_username, $this->_password, $this->_userID ) );

    }
}

?>