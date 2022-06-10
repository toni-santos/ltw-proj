<?php

    declare(strict_types = 1);
    require_once("user.php");
    require_once("restaurant.php");

    class Review {
        public int $restaurantID;
        public int $reviewerID;
        public string $message;
        public int $rating;

        public function __construct(int $restaurantID, int $reviewerID, string $message, int $rating) {
            $this->restaurantID = $restaurantID;
            $this->reviewerID = $reviewerID;
            $this->message = $message;
            $this->rating = $rating;
        }


        public function getReviewer($db) {
            return User::getUser($db, $this->reviewerID);
        }
        
        public function getRestaurant($db) {
            return Restaurant::getRestaurant($db, $this->restaurantID);
        }

    }

?>