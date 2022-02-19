CREATE TABLE IF NOT EXISTS Users (
    user_id INT PRIMARY KEY,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    phone VARCHAR(25) NOT NULL,
    email VARCHAR(50) NOT NULL,
    addy VARCHAR(150) NOT NULL,
    postal VARCHAR(25) NOT NULL, 
    login_id VARCHAR(50) NOT NULL,
    login_password VARCHAR(50) NOT NULL,
    balance FLOAT NOT NULL,
    admin_val BOOLEAN NOT NULL
);

CREATE TABLE IF NOT EXISTS Review (
    review_id INT PRIMARY KEY,
    review_text VARCHAR(300),
    user_id INT REFERENCES Users(user_id) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS Branch (
    branch_id INT PRIMARY KEY,
    lat FLOAT,
    lon FLOAT
);

CREATE TABLE IF NOT EXISTS Car (
    car_id INT PRIMARY KEY,
    model VARCHAR(25) NOT NULL,
    availibility INT NOT NULL
);

CREATE TABLE IF NOT EXISTS Trip (
    trip_id INT PRIMARY KEY,
    destination_code INT,
    price FLOAT,
    distance FLOAT,
    branch_id INT REFERENCES Branch(branch_id),
    car_id INT REFERENCES Car(car_id)
);

CREATE TABLE IF NOT EXISTS Product (
    prod_id INT PRIMARY KEY,
    prod_name VARCHAR(50) NOT NULL,
    prod_price FLOAT NOT NULL,
    img_url VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS Shopping (
    receipt_id INT PRIMARY KEY,
    shopping_price FLOAT NOT NULL,
    branch_id INT REFERENCES Branch(branch_id)
);

CREATE TABLE IF NOT EXISTS Orders (
    order_id INT PRIMARY KEY,
    date_issued DATE,
    date_completed DATE,
    order_price FLOAT NOT NULL,
    payment_code INT,
    user_id INT REFERENCES Users(user_id) ON DELETE CASCADE,
    trip_id INT REFERENCES Trip(trip_id) ON DELETE CASCADE,
    receipt_id INT REFERENCES Shopping(receipt_id) ON DELETE CASCADE,
    branch_id FLOAT REFERENCES Branch(branch_id) ON DELETE CASCADE
);
