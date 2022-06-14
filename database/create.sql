.mode columns
.headers ON
.nullvalue NULL

-- Delete existing tables

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Restaurant;
DROP TABLE IF EXISTS Dish;
DROP TABLE IF EXISTS Category;
DROP TABLE IF EXISTS Request;
DROP TABLE IF EXISTS RequestItem;
DROP TABLE IF EXISTS RestOwner;
DROP TABLE IF EXISTS Review;
DROP TABLE IF EXISTS Menu;
DROP TABLE IF EXISTS FavRestaurants;
DROP TABLE IF EXISTS FavDishes;
DROP TABLE IF EXISTS OrderedFrom;
DROP TABLE IF EXISTS RestaurantCategory;

-- Create tables

CREATE TABLE User(
    userID              INTEGER,
    username            VARCHAR(255) NOT NULL,
    email               VARCHAR(255) UNIQUE NOT NULL,
    password            VARCHAR(255) NOT NULL,
    address             TEXT,
    phoneNum            INTEGER,
    CONSTRAINT userPK PRIMARY KEY (userID),
    CONSTRAINT validEmail CHECK (email LIKE "%@%.%")
);

CREATE TABLE Restaurant(
    restaurantID        INTEGER,
    name                VARCHAR(255) NOT NULL,
    location            VARCHAR(255) NOT NULL,
    opening_time        TEXT,
    closing_time        TEXT,
    CONSTRAINT restaurantPK PRIMARY KEY (restaurantID)
);

CREATE TABLE Dish(
    dishID              INTEGER,
    name                VARCHAR(255) NOT NULL,
    price               REAL NOT NULL,
    category            TEXT NOT NULL,
    CONSTRAINT dishPK PRIMARY KEY (dishID)
);

CREATE TABLE Category(
    name                TEXT,
    CONSTRAINT categoryPK PRIMARY KEY (name)
);

CREATE TABLE Request(
    requestID           INTEGER,
    restaurantID        INTEGER,
    userID              INTEGER,
    state               TEXT NOT NULL,
    value               REAL,
    CONSTRAINT requestPK PRIMARY KEY (requestID),
    CONSTRAINT validState CHECK (state LIKE "Received" OR state LIKE "Preparing" OR state LIKE "Ready" OR state LIKE "Delivered")
);

CREATE TABLE RequestItem(
    restaurantID        INTEGER REFERENCES Restaurant(restaurantID),
    userID              INTEGER REFERENCES User(userID),
    dishID              INTEGER REFERENCES Dish(dishID),
    amount              INTEGER CHECK (amount >= 1),
    CONSTRAINT requestItemPK PRIMARY KEY (restaurantID, userID, dishID)
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
    rating              INTEGER NOT NULL
);

CREATE TABLE Menu(
    restaurantID        INTEGER REFERENCES Restaurant(restaurantID),
    dishID              INTEGER REFERENCES Dish(dishID),
    CONSTRAINT menuPK PRIMARY KEY (dishID)
);

CREATE TABLE FavRestaurants(
    restaurantID        INTEGER REFERENCES Restaurant(restaurantID),
    userID              INTEGER REFERENCES User(userID),
    CONSTRAINT favRestaurantPK PRIMARY KEY (restaurantID, userID)
);

CREATE TABLE FavDishes(
    dishID              INTEGER REFERENCES Dish(dishID),
    userID              INTEGER REFERENCES User(userID),
    CONSTRAINT favDishesPK PRIMARY KEY (dishID, userID)
);

CREATE TABLE OrderedFrom(
    restaurantID        INTEGER REFERENCES Restaurant(restaurantID),
    userID              INTEGER REFERENCES User(userID),
    orders_num          INTEGER NOT NULL,
    CONSTRAINT orderedFromPK PRIMARY KEY (restaurantID, userID)
);

CREATE TABLE RestaurantCategory(
    restaurantID        INTEGER REFERENCES Restaurant(restaurantID),
    categoryName        TEXT REFERENCES Category(name),
    CONSTRAINT restaurantTypePK PRIMARY KEY (restaurantID, categoryName)
);
