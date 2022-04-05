CREATE TABLE IF NOT EXISTS  UsersPlain(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(25),
    password VARCHAR(50)
 );

 CREATE TABLE IF NOT EXISTS  Users(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(25),
    password VARCHAR(50)
 );

  CREATE TABLE IF NOT EXISTS  UsersSalt(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(25),
    login_salt VARCHAR(50),
    password VARCHAR(50)
 );