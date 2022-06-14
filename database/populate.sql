PRAGMA FOREIGN_KEYS = ON;

-- User(userID, username, password, address, phoneNum)
INSERT INTO User VALUES (1, "João Lucas", "joaolucas2000@gmail.com", "cbfdac6008f9cab4083784cbd1874f76618d2a97", "Algures", 919988767);
INSERT INTO User VALUES (2, "António Santos", "tonigaming@hotmail.com" , "77d44acbee1aa39f3f17c59ebfcdcf83eab61b20", "Vila Nova da Telha", NULL);
INSERT INTO User VALUES (3, "Luís Osório", "zefLux@sapo.pt", "a83fc9d1ae776f5de63810f41ee682638b74c0df", "Alfena", 912345678);
INSERT INTO User VALUES (4, "Pedro Silva", "oneseven@yugioh.com", "e704dd4d2c83f974cc240a56c91392192af6b2d1", "Maia", NULL);
INSERT INTO User VALUES (5, "Toino", "invalid@email.XD", "4c6b876312bf4361ceb529aa6fc8201a818d5a9a", "Mealheira", NULL);
INSERT INTO User VALUES (6, "Anne Marie", "annemarie@email.XD", "e6b6afbd6d76bb5d2041542d7d2e3fac5bb05593", "Gaia", 998521036);
INSERT INTO User VALUES (7, "Joanne", "joa@email.XD", "eda935f888513b13f1957645c76eb56b54e5af95", "Maia", 974441245);
INSERT INTO User VALUES (8, "Shirley", "shifortes@email.XD", "5cec175b165e3d5e62c9e13ce848ef6feac81bff", "Mindelo", 963528410);
INSERT INTO User VALUES (9, "Roberto Oliveira", "robolive@email.XD", "dce17daaac756ef9d394b7a1af72730824c18757", "Valongo", 91110257);
INSERT INTO User VALUES (10, "Sam Dias", "diassam@email.XD", "1f01e0a02e4a7f0e4cb29d7fa5137101f970a1af", "Amial", 988754102);


-- Restaurant(restaurantID, name, location, category)

INSERT INTO Restaurant VALUES(1, "Mister Churrasco", "Maia", NULL, NULL);     
INSERT INTO Restaurant VALUES(2, "McDonald's", "Maia", NULL, NULL);     
INSERT INTO Restaurant VALUES(3, "Tomatino's", "Maia", NULL, NULL);  
INSERT INTO Restaurant VALUES(4, "Kebab House", "Paranhos", NULL, NULL);  
INSERT INTO Restaurant VALUES(5, "Pizza Hut", "Sao Mamede", NULL, NULL);  
INSERT INTO Restaurant VALUES(6, "The Good Burguer", "Boa Vista", NULL, NULL);  
INSERT INTO Restaurant VALUES(7, "Vitaminas", "Areosa", NULL, NULL);   
INSERT INTO Restaurant VALUES(8, "Subway", "Gaia", NULL, NULL);  
INSERT INTO Restaurant VALUES(9, "Burguer King", "Antas", NULL, NULL);  
INSERT INTO Restaurant VALUES(10, "Telepizza", "Antas", NULL, NULL); 
INSERT INTO Restaurant VALUES(11, "Nippon Sushi", "Paranhos", NULL, NULL);  
INSERT INTO Restaurant VALUES(12, "PLANTZ", "Gaia", NULL, NULL);  
INSERT INTO Restaurant VALUES(13, "Taberna Alecrim", "Matosinhos", NULL, NULL);   
INSERT INTO Restaurant VALUES(14, "Picanha Mania", "Areosa", NULL, NULL);  
INSERT INTO Restaurant VALUES(15, "Brigadeira do Porto", "Cedofeita", NULL, NULL);  
INSERT INTO Restaurant VALUES(16, "Taco Bell", "NorteShopping", NULL, NULL);  
INSERT INTO Restaurant VALUES(17, "KFC", "Parque Nascente", NULL, NULL);  
INSERT INTO Restaurant VALUES(18, "GROM Gelato", "Bonfim", NULL, NULL);  

-- Dish(dishID, name, price, photo, category)
 
INSERT INTO Dish VALUES(1, "Big Mac", 4.95, "Hamburger");     
INSERT INTO Dish VALUES(2, "Carbonara", 6.99, "Pasta");     
INSERT INTO Dish VALUES(3, "Frango", 11.99, "BBQ");     
INSERT INTO Dish VALUES(4, "Costelinhas", 8.99, "BBQ");     
INSERT INTO Dish VALUES(5, "McRoyal Bacon", 5.05, "Hamburger");
INSERT INTO Dish VALUES(6, "Pizza Pepperoni", 17.99, "Pizza");
INSERT INTO Dish VALUES(7, "Fatia Bolo Brigadeiro", 3.95, "Desert");
INSERT INTO Dish VALUES(8, "Donner Kebab", 4.95, "Kebab");
INSERT INTO Dish VALUES(9, "Pita Falafel", 3.75, "Falafel");
INSERT INTO Dish VALUES(10, "Francesinha Tradicional", 11.50, "Portuguese");
INSERT INTO Dish VALUES(11, "Caixa 8 Uramaki", 10.5, "Japonese");
INSERT INTO Dish VALUES(12, "SUB Delicias do Mar 30cm", 5.30, "Sandwich");
INSERT INTO Dish VALUES(13, "Super Bucket (7 Hotwings + 7 Tenders", 8.75, "Wings");
INSERT INTO Dish VALUES(14, "Gelado de Baunilha", 3.50, "Ice Cream");
INSERT INTO Dish VALUES(15, "Creme de Legumes", 2.75, "Soup");
INSERT INTO Dish VALUES(16, "Hot Dog com molho Cheddar e Bacon", 6.60, "Hot Dog");
INSERT INTO Dish VALUES(17, "Feijoada", 8.55, "Brazilian");
INSERT INTO Dish VALUES(18, "Picanha com Batata Frita", 9.45, "BBQ");
INSERT INTO Dish VALUES(19, "Salada de Frango e Espinafres", 6.75, "Salads");
INSERT INTO Dish VALUES(20, "Burrito de Carne Moida", 4.85, "Burritos");
INSERT INTO Dish VALUES(21, "Lasanha de soja e nozes", 6.35, "Vegan");
INSERT INTO Dish VALUES(22, "Nachos com Guacamole", 5.25, "Mexican");
INSERT INTO Dish VALUES(23, "Brownie", 3.95, "Deserts");

-- Request(userID, restaurantID, state)

-- INSERT INTO Request VALUES(1, 1, "Received");
-- INSERT INTO Request VALUES(1, 2, "Received");
-- INSERT INTO Request VALUES(2, 1, "Preparing");
-- INSERT INTO Request VALUES(3, 3, "Ready");

-- RestOwner(restaurantID, ownerID)

INSERT INTO RestOwner VALUES(1, 4);
INSERT INTO RestOwner VALUES(2, 4);
INSERT INTO RestOwner VALUES(3, 3);
INSERT INTO RestOwner VALUES(14, 5);
INSERT INTO RestOwner VALUES(15, 5);
INSERT INTO RestOwner VALUES(18, 2);
INSERT INTO RestOwner VALUES(10, 1);
INSERT INTO RestOwner VALUES(7, 1);
INSERT INTO RestOwner VALUES(12, 2);
INSERT INTO RestOwner VALUES(17, 1);
INSERT INTO RestOwner VALUES(5, 3);
INSERT INTO RestOwner VALUES(4, 3);
INSERT INTO RestOwner VALUES(6, 5);
INSERT INTO RestOwner VALUES(8, 8);
INSERT INTO RestOwner VALUES(9, 9);
INSERT INTO RestOwner VALUES(11, 8);
INSERT INTO RestOwner VALUES(13, 10);
INSERT INTO RestOwner VALUES(16, 7);

-- Review(restaurantID, reviewerID, message)

INSERT INTO Review VALUES(1, 4, "MUITO BOM!!", 5);
INSERT INTO Review VALUES(1, 3, "Mid", 3);
INSERT INTO Review VALUES(2, 1, "Como cá 3 vezes por dia :)", 5);
INSERT INTO Review VALUES(3, 2, "É bom, mas não é tão bom como Loveless (//_o)", 4);
INSERT INTO Review VALUES(18, 6, "Os bolos são mesmo fenomenais!!!", 5);
INSERT INTO Review VALUES(12, 7, "Excelente escolha para vegans :)", 5);
INSERT INTO Review VALUES(11, 9, "Já comi melhor.", 2);
INSERT INTO Review VALUES(4, 8, "Melhor Kebab da cidade. TOP!", 5);
INSERT INTO Review VALUES(13, 10, "Francesinha boa. A carne estava um pouco crua :(", 3);

-- Menu(restaurantID, dishID)

INSERT INTO Menu VALUES(1, 3);
INSERT INTO Menu VALUES(1, 4);
INSERT INTO Menu VALUES(2, 1);
INSERT INTO Menu VALUES(2, 5);
INSERT INTO Menu VALUES(3, 2);
INSERT INTO Menu VALUES(4, 8);
INSERT INTO Menu VALUES(4, 9);
INSERT INTO Menu VALUES(5, 6);
INSERT INTO Menu VALUES(7, 19);
INSERT INTO Menu VALUES(7, 15);
INSERT INTO Menu VALUES(9, 16);
INSERT INTO Menu VALUES(8, 12);
INSERT INTO Menu VALUES(10, 17);
INSERT INTO Menu VALUES(11, 11);
INSERT INTO Menu VALUES(12, 21);
INSERT INTO Menu VALUES(13, 10);
INSERT INTO Menu VALUES(14, 18);
INSERT INTO Menu VALUES(15, 7);
INSERT INTO Menu VALUES(15, 23);
INSERT INTO Menu VALUES(16, 20);
INSERT INTO Menu VALUES(16, 22);
INSERT INTO Menu VALUES(17, 13);
INSERT INTO Menu VALUES(18, 14);

-- Category(name)

INSERT INTO Category
VALUES ('Vegetarian'), ('Vegan'), ('Gluten Free'), ('Asian'), ('Fast Food'),
('Burger'), ('Pizza'), ('Italian'), ('Sushi'), ('Healthy'), ('BBQ'), ('Portuguese'),
('Sandwich'), ('Desserts'), ('Poke'), ('Brazilian'), ('Kebab'), ('Chinese'),
('Comfort Food'), ('Mexican'), ('Juice and Smoothies'), ('Indian'), ('Chicken'),
('Bakery'), ('Pasta'), ('Deli'), ('Soup'), ('Hot Dog'), ('Wings'), ('Thai'),
('Salads'), ('Seafood'), ('Pastry'), ('Burritos'), ('American'), ('European'),
('Fish and Chips'), ('Ice Cream'), ('Coffee and Tea'), ('Middle Eastern'),
('Halal'), ('Japanese'), ('Turkish'), ('Pub'), ('Spanish'), ('Hawaiian'),
('South American'), ('Greek'), ('Mediterranean'), ('Falafel');

-- RestaurantCategory(restaurantID, categoryName)

INSERT INTO RestaurantCategory VALUES (1, "American");
INSERT INTO RestaurantCategory VALUES (2, "Vegan");
INSERT INTO RestaurantCategory VALUES (2, "Fast Food");
INSERT INTO RestaurantCategory VALUES (3, "BBQ");
INSERT INTO RestaurantCategory VALUES (4, "Kebab");
INSERT INTO RestaurantCategory VALUES (4, "Falafel");
INSERT INTO RestaurantCategory VALUES (5, "Pizza");
INSERT INTO RestaurantCategory VALUES (5, "Fast Food");
INSERT INTO RestaurantCategory VALUES (6, "Burger");
INSERT INTO RestaurantCategory VALUES (7, "Salads");
INSERT INTO RestaurantCategory VALUES (7, "Healthy");
INSERT INTO RestaurantCategory VALUES (8, "Sandwich");
INSERT INTO RestaurantCategory VALUES (9, "Hot Dog");
INSERT INTO RestaurantCategory VALUES (10, "Brazilian");
INSERT INTO RestaurantCategory VALUES (11, "Sushi");
INSERT INTO RestaurantCategory VALUES (11, "Japanese");
INSERT INTO RestaurantCategory VALUES (12, "Vegan");
INSERT INTO RestaurantCategory VALUES (12, "Salads");
INSERT INTO RestaurantCategory VALUES (13, "Portuguese");
INSERT INTO RestaurantCategory VALUES (13, "Comfort Food");
INSERT INTO RestaurantCategory VALUES (14, "BBQ");
INSERT INTO RestaurantCategory VALUES (15, "Pastry");
INSERT INTO RestaurantCategory VALUES (15, "Desserts");
INSERT INTO RestaurantCategory VALUES (16, "Mexican");
INSERT INTO RestaurantCategory VALUES (16, "Burritos");
INSERT INTO RestaurantCategory VALUES (17, "Burger");
INSERT INTO RestaurantCategory VALUES (17, "Wings");
INSERT INTO RestaurantCategory VALUES (17, "Chicken");
INSERT INTO RestaurantCategory VALUES (17, "American");
INSERT INTO RestaurantCategory VALUES (18, "Ice Cream");
