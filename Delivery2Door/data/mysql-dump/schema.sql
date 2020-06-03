CREATE TABLE CustomerAddress (
	address VARCHAR(100) PRIMARY KEY,
	dist_from_store FLOAT
);

CREATE TABLE Customer (
	customer_id int PRIMARY KEY,
	name varchar(75),
	num_orders int,
	address varchar(100),
	email_addr varchar(75),
	FOREIGN KEY (address) REFERENCES CustomerAddress(address)
		ON DELETE SET NULL
);

CREATE TABLE SubscriptionCustomer (
	customer_id int,
	points int,
	member_since date,
	PRIMARY KEY (customer_id),
	FOREIGN KEY (customer_id) REFERENCES Customer(customer_id)
		ON DELETE CASCADE
);

CREATE TABLE DeliveryDriver (
	driver_id int PRIMARY KEY,
	name varchar(75),
	rating int
);

CREATE TABLE DeliveryVehicle (
	vehicle_id int PRIMARY KEY,
	model varchar(75)
);

CREATE TABLE Orders (
	order_num int,
	total_price float,
	estimated_delivery date,
	customer_id int,
	driver_id int NOT NULL,
	vehicle_id int NOT NULL,
	PRIMARY KEY (order_num, customer_id),
	FOREIGN KEY (customer_id) REFERENCES Customer(customer_id)
		ON DELETE CASCADE,
	FOREIGN KEY (driver_id) REFERENCES DeliveryDriver(driver_id)
		ON DELETE NO ACTION,
	FOREIGN KEY (vehicle_id) REFERENCES DeliveryVehicle(vehicle_id)
		ON DELETE NO ACTION
);

CREATE TABLE PaymentMethod (
	payment_id int PRIMARY KEY,
	expiry date,
	customer_id int NOT NULL,
	FOREIGN KEY (customer_id) REFERENCES Customer(customer_id)
		ON DELETE CASCADE
);

CREATE TABLE GiftCard (
	payment_id int PRIMARY KEY,
	balanceRemaining float,
	customer_id int,
	FOREIGN KEY (payment_id) REFERENCES PaymentMethod(payment_id)
		ON DELETE CASCADE,
	FOREIGN KEY (customer_id) REFERENCES Customer(customer_id)
		ON DELETE SET NULL
);

CREATE TABLE CreditCard (
	payment_id int PRIMARY KEY,
	cardholder_name varchar(75),
	card_num int,
	FOREIGN KEY (payment_id) REFERENCES PaymentMethod(payment_id)
		ON DELETE CASCADE
);

CREATE TABLE StoreRatings (
	avg_income int PRIMARY KEY,
	rating int
);

CREATE TABLE Store (
	store_addr varchar(100) PRIMARY KEY, 
	avg_income int, 
	FOREIGN KEY (avg_income) REFERENCES StoreRatings(avg_income)
		ON DELETE SET NULL
);

CREATE TABLE InventoryItem (
	item_id int PRIMARY KEY,
	name varchar(100),
	price float,
	store_addr varchar(100) NOT NULL,
	FOREIGN KEY (store_addr) REFERENCES Store(store_addr)
		ON DELETE CASCADE
);

CREATE TABLE Contains (
	customer_id int,
	order_num int,
	item_id int,
	PRIMARY KEY (customer_id, order_num, item_id),
	FOREIGN KEY (customer_id) REFERENCES Customer(customer_id)
		ON DELETE CASCADE,
	FOREIGN KEY (order_num) REFERENCES Orders(order_num)
		ON DELETE CASCADE,
	FOREIGN KEY (item_id) REFERENCES InventoryItem(item_id)
		ON DELETE CASCADE
);

CREATE TABLE RetailItem (
	item_id int PRIMARY KEY,
	brand varchar(50),
	FOREIGN KEY (item_id) REFERENCES InventoryItem(item_id)
		ON DELETE CASCADE
);

CREATE TABLE ElectronicItem (
	item_id int PRIMARY KEY,
	serial_num varchar(50),
	FOREIGN KEY (item_id) REFERENCES InventoryItem(item_id)
		ON DELETE CASCADE
);

CREATE TABLE FoodItem (
	item_id int PRIMARY KEY,
	date_made date,
	expiry_date date,
	FOREIGN KEY (item_id) REFERENCES InventoryItem(item_id)
		ON DELETE CASCADE
);

CREATE TABLE Manager (
	manager_id int PRIMARY KEY,
	name varchar(50),
	yrs_experience int
);

CREATE TABLE Manages (
	manager_id int,
	store_addr varchar(100),
	PRIMARY KEY (manager_id, store_addr),
	FOREIGN KEY (manager_id) REFERENCES Manager(manager_id)
		ON DELETE CASCADE,
	FOREIGN KEY (store_addr) REFERENCES Store(store_addr)
		ON DELETE CASCADE
);

CREATE TABLE Employs (
	manager_id int,
	driver_id int,
	vehicle_id int,
	PRIMARY KEY (manager_id, driver_id, vehicle_id),
	FOREIGN KEY (manager_id) REFERENCES Manager(manager_id)
		ON DELETE NO ACTION,
	FOREIGN KEY (driver_id) REFERENCES DeliveryDriver(driver_id)
		ON DELETE NO ACTION,
	FOREIGN KEY (vehicle_id) REFERENCES DeliveryVehicle(vehicle_id)
		ON DELETE NO ACTION
);
