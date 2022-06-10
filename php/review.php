<?php

    declare(strict_types = 1);
    require_once("user.php");

    class Review {
        public int $reviewerID;
        public string $message;
        public int $rating;

        public function __construct(int $reviewerID, string $message, int $rating) {
            $this->reviewerID = $reviewerID;
            $this->$message = $message;
            $this->rating = $rating;
        }


        public function getReviewer($db) {
            return User::getUser($db, $this->reviewerID);
        }

    }

?>