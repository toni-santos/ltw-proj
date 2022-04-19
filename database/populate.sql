PRAGMA FOREIGN_KEYS = ON;

-- User(userID, username, password, address, phoneNum, profilePic)
INSERT INTO User VALUES (1, "João Lucas", "password123", "Algures", 919988767, "https://d5y9g7a5.rocketcdn.me/wp-content/uploads/2021/03/trollface-origem-significado-e-polemicas-em-torno-do-meme-960x596.jpg");
INSERT INTO User VALUES (2, "António Santos", "shoegaze4ever", "Vila Nova da Telha", NULL, "https://upload.wikimedia.org/wikipedia/pt/b/b5/Capa_de_Loveless.jpg");
INSERT INTO User VALUES (3, "Luís Osório", "cringeIRL", "Alfena", 912345678, NULL);
INSERT INTO User VALUES (4, "Pedro Silva", "valorantGaming", "Maia", NULL, NULL);

-- Restaurant(restaurantID, name, location, category)

INSERT INTO Restaurant VALUES(1, "Mister Churrasco", "Maia", "BBQ");     
INSERT INTO Restaurant VALUES(2, "McDonald's", "Maia", "Hamburger");     
INSERT INTO Restaurant VALUES(3, "Tomatino's", "Maia", "Italian");     

-- Dish(dishID, name, price, photo, category)

INSERT INTO Dish VALUES(1, "Big Mac", 4.95, NULL, "Hamburger");     
INSERT INTO Dish VALUES(2, "Carbonara", 6.99, NULL, "Pasta");     
INSERT INTO Dish VALUES(3, "Frango", 11.99, NULL, "BBQ");     
INSERT INTO Dish VALUES(4, "Costelinhas", 8.99, NULL, "BBQ");     
INSERT INTO Dish VALUES(5, "McRoyal Bacon", 5.05, NULL, "Hamburger");

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