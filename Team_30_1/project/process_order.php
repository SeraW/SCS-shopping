<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
try {
    $total = $_POST["FinalValue"];
    $shipping = $_POST["date"];

    $user = $_SESSION["username"];
    $uid = "SELECT user_id FROM users WHERE login_id = '$user'";
    $result = mysqli_query($db, $uid);
    $user_id = mysqli_fetch_row($result);

    $trip_price = 0.00;
    if ($shipping == 1) {
        $trip_price = 6.99;
    } else if ($shipping == 2) {
        $trip_price = 5.99;
    }

    $destination_code = 1;
    $distance = 50;
    $dest = $_POST["end"];
    $branch_check = "SELECT branch_id FROM branch WHERE branch_addy = '$dest'";
    $result = mysqli_query($db, $branch_check);
    $branch_id = mysqli_fetch_row($result);
    $car_id = $_POST["car"];

    $tripAdd = "INSERT into trip(destination_code, trip_price, distance, branch_id, car_id)
                VALUES ($destination_code, $trip_price, $distance, $branch_id[0], $car_id)";
    mysqli_query($db, $tripAdd);
    $trip_id = mysqli_insert_id($db);
    $shoppingAdd = "INSERT into shopping(shopping_price, branch_id) values ($total, $branch_id[0])";
    mysqli_query($db, $shoppingAdd);
    $receipt_id = mysqli_insert_id($db);

    $insertOrder = "INSERT into orders(date_issued, date_completed, order_price, payment_code, user_id, trip_id, receipt_id, branch_id) 
                VALUES (CURDATE(), CURDATE()+ INTERVAL $shipping DAY, $total, 1, $user_id[0], $trip_id, $receipt_id, $branch_id[0])";
    mysqli_query($db, $insertOrder);
} catch (throwable $e) {
    echo $e;
}
mysqli_close($db);
setcookie("cart", "", time()-3600);
header('Location: invoicecomplete.php');
die();
