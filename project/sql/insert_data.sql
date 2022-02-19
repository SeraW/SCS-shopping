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
VALUES (0000, 2022-01-20, '2022-01-25', 81.48, 0000, 0003, 0000, 0000, 0000),
        (0001, 2022-01-26, '2022-02-01', 107.03, 0001, 0004,0001, 0001, 0001),
        (0002, 2022-02-10, '2022-02-13', 45.49, 0002, 0005, 0002, 0002, 0002);





