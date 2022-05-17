.mode columns
.headers ON
.nullvalue NULL

-- Delete existing tables

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Restaurant;
DROP TABLE IF EXISTS Dish;
DROP TABLE IF EXISTS Request;
DROP TABLE IF EXISTS RestOwner;
DROP TABLE IF EXISTS Review;
DROP TABLE IF EXISTS Menu;

-- Create tables

CREATE TABLE User(
    userID              INTEGER,
    username            VARCHAR(255) NOT NULL,
    email               VARCHAR(255) NOT NULL,
    password            VARCHAR(255) NOT NULL,
    address             TEXT,
    phoneNum            INTEGER,
    profilePic          TEXT,
    CONSTRAINT userPK PRIMARY KEY (userID)
);

CREATE TABLE Restaurant(
    restaurantID        INTEGER,
    name                VARCHAR(255) NOT NULL,
    location            VARCHAR(255) NOT NULL,
    category            TEXT NOT NULL,
    CONSTRAINT restaurantPK PRIMARY KEY (restaurantID)
);

CREATE TABLE Dish(
    dishID              INTEGER,
    name                VARCHAR(255) NOT NULL,
    price               REAL NOT NULL,
    photo               TEXT,
    category            TEXT NOT NULL,
    CONSTRAINT dishPK PRIMARY KEY (dishID)
);

CREATE TABLE Request(
    restaurantID        INTEGER REFERENCES Restaurant(restaurantID),
    userID              INTEGER REFERENCES User(userID),
    state               TEXT NOT NULL,
    CONSTRAINT requestPK PRIMARY KEY (restaurantID, userID),
    CONSTRAINT validState CHECK (state LIKE "Received" OR state LIKE "Preparing" OR state LIKE "Ready" OR state LIKE "Delivered")
);

CREATE TABLE RestOwner(
    restaurantID        INTEGER REFERENCES Restaurant(restaurantID),
    ownerID             INTEGER REFERENCES User(userID),
    CONSTRAINT restOwnerPK PRIMARY KEY (restaurantID)
);

CREATE TABLE Review(
    restaurantID        INTEGER REFERENCES Restaurant(restaurantID),
    reviewerID          INTEGER REFERENCES User(userID),
    message             TEXT NOT NULL,
    CONSTRAINT reviewPK PRIMARY KEY (restaurantID, reviewerID)
);

CREATE TABLE Menu(
    restaurantID        INTEGER REFERENCES Restaurant(restaurantID),
    dishID              INTEGER REFERENCES Dish(dishID),
    CONSTRAINT menuPK PRIMARY KEY (restaurantID, dishID)
);