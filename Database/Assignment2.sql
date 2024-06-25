/*Student Name: Hsin Tang, Yui Hei Wong, Jialing Liang
  File Name: Assignment2.sql
  Stuednt Number: 041111914, 041105962, 040784842
  Edit Date: 2024.Apr.01
  Description: This is the backend database table query.*/


CREATE DATABASE Assignment2;

USE Assignment2;

/*Create Tables*/
/*For Registration*/ 
CREATE TABLE users (
    user_id 	INT 			AUTO_INCREMENT PRIMARY KEY,
    email 		VARCHAR(255) 	NOT NULL,
    password 	VARCHAR(255) 	NOT NULL,
    agree_terms	BOOLEAN 		NOT NULL
);

/*For Order*/
CREATE TABLE Category (
    category_id 	INT 			AUTO_INCREMENT PRIMARY KEY,
    category_name 	VARCHAR(100) 	NOT NULL UNIQUE
);

CREATE TABLE MenuItem (
    menuitem_id 	INT 			AUTO_INCREMENT PRIMARY KEY,
    menuitem_name 	VARCHAR(100) 	NOT NULL,
    item_price 		DECIMAL(10, 2) 	NOT NULL,
    category_id 	INT,
    FOREIGN KEY (category_id)	REFERENCES Category(category_id)
);

/*For Contact*/

CREATE TABLE Contact (
    contact_id		INT 			AUTO_INCREMENT PRIMARY KEY,
	name 			VARCHAR(50) 	NOT NULL,
    email 			VARCHAR(100) 	NOT NULL,
    topic 			VARCHAR(100) 	NOT NULL,
    message 		VARCHAR(500)	NOT NULL
);



/*Add Our 5 Categories*/
INSERT INTO Category (category_name) VALUES
    ('Main Salads'),
    ('Side Desserts (Healthy Options)'),
    ('Fresh Smoothies'),
    ('Specialty Drinks'),
    ('Coffee');

/*Category 1 is Main Salads, and add these items.*/
INSERT INTO MenuItem (menuitem_name, item_price, category_id) VALUES
    ('Green Goddess Power Bowl', 12.99, 1),
    ('Asian Sesame Ginger Salad', 10.99, 1),
    ('Caprese Salad', 9.99, 1),
    ('Strawberry Spinach Salad', 11.49, 1),
    ('Mexican Street Corn Salad', 10.99, 1),
    ('Grilled Chicken Caesar Salad', 13.99, 1),
    ('Shrimp and Avocado Cobb Salad', 15.49, 1),
    ('Steak and Blue Cheese Spinach Salad', 14.99, 1),
    ('Mediterranean Chicken and Orzo Salad', 12.99, 1),
    ('Citrus Glazed Shrimp and Quinoa Salad', 16.99, 1),
    ('Tuna Nicoise Salad', 13.49, 1),
    ('Spicy Thai Beef Salad', 14.99, 1);

/*Category 2 is Side Desserts (Healthy Options), and add these items.*/
INSERT INTO MenuItem (menuitem_name, item_price, category_id) VALUES
    ('Chia Seed Pudding', 7.99, 2),
    ('Greek Yogurt Parfait', 8.49, 2),
    ('Baked Apple Slices', 6.99, 2),
    ('Dark Chocolate Avocado Mousse', 9.99, 2);

/*Category 3 is Fresh Smoothies, and add these items.*/
INSERT INTO MenuItem (menuitem_name, item_price, category_id) VALUES
    ('Tropical Bliss', 6.99, 3),
    ('Berry Burst', 7.49, 3),
    ('Green Goddess Smoothie', 8.99, 3);

/*Category 4 is Specialty Drinks, and add these items.*/
INSERT INTO MenuItem (menuitem_name, item_price, category_id) VALUES
    ('Matcha Latte', 5.99, 4),
    ('Turmeric Golden Milk', 6.49, 4),
    ('Hibiscus Mint Iced Tea', 4.99, 4);

/*--Category 5 is Coffee, and add these items.*/
INSERT INTO MenuItem (menuitem_name, item_price, category_id) VALUES
    ('Espresso', 2.99, 5),
    ('Cappuccino', 4.49, 5),
    ('Cold Brew', 3.99, 5);

