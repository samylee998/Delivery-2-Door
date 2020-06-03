INSERT INTO CustomerAddress VALUES ('5000 148 Ave', 137.23);
INSERT INTO CustomerAddress VALUES ('137 Foobar Rd', 87.3);
INSERT INTO CustomerAddress VALUES ('082 Qux St', 50.00);
INSERT INTO CustomerAddress VALUES ('1328 Marine Dr', 3252.23);
INSERT INTO CustomerAddress VALUES ('011235 Fibonacci Way', 9999.73);

INSERT INTO Customer VALUES (1, 'John Doe', 8, '5000 148 Ave', 'jdoe@hotmail.com');
INSERT INTO Customer VALUES (2, 'Bill Gates', 60, '5000 148 Ave', 'bgates@ms.com');
INSERT INTO Customer VALUES (3, 'Steve Jobs', 25, '137 Foobar Rd', 'steve@apple.com');
INSERT INTO Customer VALUES (4, 'Donald Trump', 9999999, '082 Qux St', 'cheeto@yahoo.ca');
INSERT INTO Customer VALUES (5, 'Foo Bar', 0, '1328 Marine Dr', 'baz@foobar.net');

INSERT INTO SubscriptionCustomer VALUES (1, 100, '2019-12-20');
INSERT INTO SubscriptionCustomer VALUES (2, 5000, '2020-01-31');
INSERT INTO SubscriptionCustomer VALUES (3, 1350, '2008-11-11');
INSERT INTO SubscriptionCustomer VALUES (4, 400, '2012-03-28');
INSERT INTO SubscriptionCustomer VALUES (5, 6925, '2015-07-08');

INSERT INTO DeliveryDriver VALUES (1, 'Steve L.', 9);
INSERT INTO DeliveryDriver VALUES (2, 'Billy Smith', 7);
INSERT INTO DeliveryDriver VALUES (3, 'James', 6);
INSERT INTO DeliveryDriver VALUES (4, 'David Ayres', 10);
INSERT INTO DeliveryDriver VALUES (5, 'Adrian G. Smith', 7);

INSERT INTO DeliveryVehicle VALUES (2, 'Toyota Prius');
INSERT INTO DeliveryVehicle VALUES (7, 'Honda Civid');
INSERT INTO DeliveryVehicle VALUES (8, 'Tesla Model S');
INSERT INTO DeliveryVehicle VALUES (9, 'Audi A5');
INSERT INTO DeliveryVehicle VALUES (11, 'Hot Wheels');

INSERT INTO Orders VALUES (7, 42.17, '2020-02-28', 1, 5, 8);
INSERT INTO Orders VALUES (7, 500.99, '2020-01-15', 2, 4, 9);
INSERT INTO Orders VALUES (9, 438.20, '2019-08-13', 2, 3, 7);
INSERT INTO Orders VALUES (13, 87.00, '2020-03-14', 5, 2, 11);
INSERT INTO Orders VALUES (6, 679.95, '2020-04-03', 4, 1, 2);

INSERT INTO PaymentMethod VALUES (1, '2024-08-01', 4);
INSERT INTO PaymentMethod VALUES (2, '2027-09-11', 3);
INSERT INTO PaymentMethod VALUES (3, '2020-08-15', 1);
INSERT INTO PaymentMethod VALUES (4, '2022-07-20', 2);
INSERT INTO PaymentMethod VALUES (5, '2018-05-31', 5);
INSERT INTO PaymentMethod VALUES (6, '2025-12-31', 1);
INSERT INTO PaymentMethod VALUES (7, '2021-01-01', 3);
INSERT INTO PaymentMethod VALUES (8, '2025-09-15', 2);
INSERT INTO PaymentMethod VALUES (9, '2020-11-05', 4);
INSERT INTO PaymentMethod VALUES (10, '2023-07-16', 5);

INSERT INTO GiftCard VALUES (1, 25.17, 4);
INSERT INTO GiftCard VALUES (2, 0.00, 3);
INSERT INTO GiftCard VALUES (6, 170.92, 1);
INSERT INTO GiftCard VALUES (7, 50.0, 3);
INSERT INTO GiftCard VALUES (9, 67.32, 4);

INSERT INTO CreditCard VALUES (3, 'John Doe', 54892301);
INSERT INTO CreditCard VALUES (4, 'Bill Gates', NULL);
INSERT INTO CreditCard VALUES (5, 'Foo B. Bar', 23102059);
INSERT INTO CreditCard VALUES (8, 'B. Gates', 86921483);
INSERT INTO CreditCard VALUES (10, 'Foo Baz Bar', 83956325);

INSERT INTO StoreRatings VALUES (500000, 3);
INSERT INTO StoreRatings VALUES (4500582, 9);
INSERT INTO StoreRatings VALUES (679803, 5);
INSERT INTO StoreRatings VALUES (1333053, 7);
INSERT INTO StoreRatings VALUES (7555039, 10);

INSERT INTO Store VALUES ('1102 Foo St', 500000);
INSERT INTO Store VALUES ('128 Bar Ave', 4500582);
INSERT INTO Store VALUES ('99 Baz Blvd', 679803);
INSERT INTO Store VALUES ('137 Qux Cresc', 1333053);
INSERT INTO Store VALUES ('1832 Recursion St', 7555039);

INSERT INTO InventoryItem VALUES (1, 'T-Shirt', 5.85, '1102 Foo St');
INSERT INTO InventoryItem VALUES (2, 'Jeans', 70.00, '99 Baz Blvd');
INSERT INTO InventoryItem VALUES (3, 'Hoodie', 45.99, '1102 Foo St');
INSERT INTO InventoryItem VALUES (4, 'Socks', 12.20, '128 Bar Ave');
INSERT INTO InventoryItem VALUES (5, 'Sweater', 35.70, '128 Bar Ave');
INSERT INTO InventoryItem VALUES (6, 'Headphones', 300.95, '99 Baz Blvd');
INSERT INTO InventoryItem VALUES (7, 'Mouse', 13.75, '1102 Foo St');
INSERT INTO InventoryItem VALUES (8, 'USB Cable', 3.50, '99 Baz Blvd');
INSERT INTO InventoryItem VALUES (9, 'Phone', 599.99, '128 Bar Ave');
INSERT INTO InventoryItem VALUES (10, 'Drone', 3000.00, '128 Bar Ave');
INSERT INTO InventoryItem VALUES (11, 'Caviar', 400.00, '1102 Foo St');
INSERT INTO InventoryItem VALUES (12, 'Chocolate', 6.50, '128 Bar Ave');
INSERT INTO InventoryItem VALUES (13, 'Lettuce', 2.39, '99 Baz Blvd');
INSERT INTO InventoryItem VALUES (14, 'Tomato', 0.99, '137 Qux Cresc');
INSERT INTO InventoryItem VALUES (15, 'Banana', 0.50, '1102 Foo St');

INSERT INTO RetailItem VALUES (1, 'J Crew');
INSERT INTO RetailItem VALUES (2, 'Levis');
INSERT INTO RetailItem VALUES (3, 'Supreme');
INSERT INTO RetailItem VALUES (4, 'Uniqlo');
INSERT INTO RetailItem VALUES (5, 'GAP');

INSERT INTO ElectronicItem VALUES (6, 38293884);
INSERT INTO ElectronicItem VALUES (7, 12364355);
INSERT INTO ElectronicItem VALUES (8, 59382756);
INSERT INTO ElectronicItem VALUES (9, 77246721);
INSERT INTO ElectronicItem VALUES (10, 36321795);

INSERT INTO FoodItem VALUES (11, '2020-01-25', '2020-12-15');
INSERT INTO FoodItem VALUES (12, '2020-02-15', '2020-05-17');
INSERT INTO FoodItem VALUES (13, '2019-07-08', '2019-07-16');
INSERT INTO FoodItem VALUES (14, '2020-02-15', '2020-02-25');
INSERT INTO FoodItem VALUES (15, '2020-01-31', '2020-02-08');

INSERT INTO Contains VALUES (1, 7, 1);
INSERT INTO Contains VALUES (5, 13, 2);
INSERT INTO Contains VALUES (4, 6, 3);
INSERT INTO Contains VALUES (4, 6, 4);
INSERT INTO Contains VALUES (4, 6, 6);
INSERT INTO Contains VALUES (5, 13, 7);
INSERT INTO Contains VALUES (1, 7, 8);
INSERT INTO Contains VALUES (4, 6, 9);
INSERT INTO Contains VALUES (1, 7, 12);
INSERT INTO Contains VALUES (5, 13, 15);
-- Customer 2 orders every item (for division query)
INSERT INTO Contains VALUES (2, 9, 1);
INSERT INTO Contains VALUES (2, 9, 2);
INSERT INTO Contains VALUES (2, 7, 3);
INSERT INTO Contains VALUES (2, 9, 4);
INSERT INTO Contains VALUES (2, 7, 5);
INSERT INTO Contains VALUES (2, 9, 6);
INSERT INTO Contains VALUES (2, 9, 7);
INSERT INTO Contains VALUES (2, 7, 7);
INSERT INTO Contains VALUES (2, 9, 8);
INSERT INTO Contains VALUES (2, 9, 9);
INSERT INTO Contains VALUES (2, 9, 10);
INSERT INTO Contains VALUES (2, 9, 11);
INSERT INTO Contains VALUES (2, 9, 12);
INSERT INTO Contains VALUES (2, 7, 13);
INSERT INTO Contains VALUES (2, 9, 14);
INSERT INTO Contains VALUES (2, 9, 15);

INSERT INTO Manager VALUES (1, 'Foo Bar', 21);
INSERT INTO Manager VALUES (2, 'Kyle Clark', 3);
INSERT INTO Manager VALUES (3, 'Bob Iger', 26);
INSERT INTO Manager VALUES (4, 'Barack Obama', 15);
INSERT INTO Manager VALUES (5, 'Jane Doe', 8);

INSERT INTO Manages VALUES (3, '1832 Recursion St');
INSERT INTO Manages VALUES (5, '99 Baz Blvd');
INSERT INTO Manages VALUES (3, '137 Qux Cresc');
INSERT INTO Manages VALUES (1, '1102 Foo St');
INSERT INTO Manages VALUES (2, '1832 Recursion St');

INSERT INTO Employs VALUES (1, 5, 8);
INSERT INTO Employs VALUES (2, 4, 9);
INSERT INTO Employs VALUES (3, 3, 7);
INSERT INTO Employs VALUES (5, 2, 11);
INSERT INTO Employs VALUES (5, 1, 2);
