CREATE TABLE IF NOT EXISTS Users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
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
    review_text VARCHAR(500),
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
    availibility VARCHAR(25) NOT NULL
);

CREATE TABLE IF NOT EXISTS Trip (
    trip_id INT PRIMARY KEY,
    destination_code INT,
    trip_price FLOAT,
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

INSERT INTO Users (user_id, first_name, last_name, phone, email, addy, postal, login_id, login_password, balance, admin_val)
VALUES (0000, 'Dave', 'Tran', '000-000-0000', 'dave.tran@gmail.com', '22 road town', 'L04H7S', 'davetran', 'coolguy', 500.00, true),
        (0001, 'Anthony', 'Tran', '000-000-0001', 'atran@gmail.com', '521 avenue road', 'L2H83T', 'atran', 'iplaygenshin', 500.00, true),
        (0002, 'Sera', 'Wong', '000-000-0002', 'swong@gmail.com', '982 drive area', 'L0D27H', 'swong', 'catscats', 500.00, true),
        (0003, 'Nanamin', 'Kento', '000-000-0003', 'nkento@gmail.com', '123 area road', 'P9H2J7', 'nkento', 'seventothree', 700.00, false),
        (0004, 'Seto', 'Kaiba', '000-000-0004', 'skaiba@gmail.com', '192 kaiba world', 'W29J72', 'skaiba', 'imtheceo', 5000.00, false),
        (0005, 'Yae', 'Miko', '000-000-0005', 'ymiko@gmail.com', '103 sakura tree', 'U8E2K8', 'ymiko', 'fivestar', 900.50, false),
        (0006, 'Jimothy', 'Jacobs', '000-000-0006', 'jimothy@gmail.com', '12 town road', 'H8DL0S', 'jjacob', 'password', 300, false);


INSERT INTO Review (review_id, review_text, user_id)
VALUES (0000, 'I am happy with the service I received. I ordered a smartphone and received it in good time at a reasonable price.', 0003),
        (0001, 'I ordered one thing and received something completely different, I''m not mad though', 0005),
        (0002, 'This place is better than KaibaCorp. 5/5 stars', 0004),
        (0003, 'I enjoy being able to shop to my needs while also being able to help the environment at the same time.', 0006);

INSERT INTO Branch (branch_id, lat, lon)
VALUES (0000, 43.657374, -79.378804),
        (0001, 43.668255, -79.395536),
        (0002, 43.654423, -79.444962),
        (0003, 43.761754, -79.410740);

INSERT INTO Car (car_id, model, availibility)
VALUES (0001, 'Subaru', 'Available'),
        (0002, 'Subaru', 'Available'),
        (0003, 'Subaru', 'Available'),
        (0004, 'Lamborghini', 'Unavailable');

INSERT INTO Trip (trip_id, destination_code, trip_price, distance, branch_id, car_id)
VALUES (0000, 0001, 10.50, 52.00, 0000, 0002),
        (0001, 0002, 35.87, 68.9, 0001, 0003),
        (0002, 0003, 5.65, 10.00, 0002, 0001);

INSERT INTO Product (prod_id, prod_name, prod_price, img_url)
VALUES (0001, 'Coffee machine', 45.49, 'img/products/coffee.png'), 
        (0002, 'Microwave', 99.99, 'img/products/microwave.png'),
        (0003, 'Rice cooker', 35.99, 'img/products/rice.jpg'),
        (0004, 'Toaster', 25.55, 'img/products/toaster.jpg'),
        (0005, 'Electric Kettle', 54.99, 'img/products/kettle.jpg'),
        (0006,'Waffle Maker', 40.00, 'img/products/waffle.jpeg'),
        (0007, 'Blender', 149.99, 'img/products/blender.png');

INSERT INTO Shopping (receipt_id, shopping_price, branch_id)
VALUES (0000, 81.48, 0000),
        (0001, 107.03, 0001),
        (0002, 45.49, 0002);

INSERT INTO Orders (order_id, date_issued, date_completed, order_price, payment_code, user_id, trip_id, receipt_id, branch_id)
VALUES (0000, '2022-01-20', '2022-01-25', 81.48, 0000, 0003, 0000, 0000, 0000),
        (0001, '2022-01-26', '2022-02-01', 107.03, 0001, 0004,0001, 0001, 0001),
        (0002, '2022-02-10', '2022-02-13', 45.49, 0002, 0005, 0002, 0002, 0002);


