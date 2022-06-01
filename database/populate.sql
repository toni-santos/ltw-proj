PRAGMA FOREIGN_KEYS = ON;

-- User(userID, username, password, address, phoneNum)
INSERT INTO User VALUES (1, "João Lucas", "joaolucas2000@gmail.com", "cbfdac6008f9cab4083784cbd1874f76618d2a97", "Algures", 919988767);
INSERT INTO User VALUES (2, "António Santos", "tonigaming@hotmail.com" , "77d44acbee1aa39f3f17c59ebfcdcf83eab61b20", "Vila Nova da Telha", NULL);
INSERT INTO User VALUES (3, "Luís Osório", "zefLux@sapo.pt", "a83fc9d1ae776f5de63810f41ee682638b74c0df", "Alfena", 912345678);
INSERT INTO User VALUES (4, "Pedro Silva", "oneseven@yugioh.com", "e704dd4d2c83f974cc240a56c91392192af6b2d1", "Maia", NULL);
INSERT INTO User VALUES (5, "Toino", "invalid@email.XD", "4c6b876312bf4361ceb529aa6fc8201a818d5a9a", "Mealheira", NULL);

-- Restaurant(restaurantID, name, location, category)

INSERT INTO Restaurant VALUES(1, "Mister Churrasco", "Maia", "BBQ", NULL, NULL);     
INSERT INTO Restaurant VALUES(2, "McDonald's", "Maia", "Hamburger", NULL, NULL);     
INSERT INTO Restaurant VALUES(3, "Tomatino's", "Maia", "Italian", NULL, NULL);     

-- Dish(dishID, name, price, photo, category)

INSERT INTO Dish VALUES(1, "Big Mac", 4.95, "Hamburger");     
INSERT INTO Dish VALUES(2, "Carbonara", 6.99, "Pasta");     
INSERT INTO Dish VALUES(3, "Frango", 11.99, "BBQ");     
INSERT INTO Dish VALUES(4, "Costelinhas", 8.99, "BBQ");     
INSERT INTO Dish VALUES(5, "McRoyal Bacon", 5.05, "Hamburger");

-- Request(userID, restaurantID, state)

INSERT INTO Request VALUES(1, 1, "Received");
INSERT INTO Request VALUES(1, 2, "Received");
INSERT INTO Request VALUES(2, 1, "Preparing");
INSERT INTO Request VALUES(3, 3, "Ready");

-- RestOwner(restaurantID, ownerID)

INSERT INTO RestOwner VALUES(1, 4);
INSERT INTO RestOwner VALUES(2, 4);
INSERT INTO RestOwner VALUES(3, 3);

-- Review(restaurantID, reviewerID, message)

INSERT INTO Review VALUES(1, 4, "MUITO BOM!!");
INSERT INTO Review VALUES(1, 3, "Mid");
INSERT INTO Review VALUES(2, 1, "Como cá 3 vezes por dia :)");
INSERT INTO Review VALUES(3, 2, "É bom, mas não é tão bom como Loveless (\/_o)");

-- Menu(restaurantID, dishID)

INSERT INTO Menu VALUES(1, 3);
INSERT INTO Menu VALUES(1, 4);
INSERT INTO Menu VALUES(2, 1);
INSERT INTO Menu VALUES(2, 5);
INSERT INTO Menu VALUES(3, 2);
INSERT INTO Menu VALUES(1, 1);