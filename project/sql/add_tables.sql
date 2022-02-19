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