<?php
$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$date_issued = $_POST["date_issued"];
$date_completed = $_POST["date_completed"];
$order_price = $_POST["order_price"];
$payment_code = $_POST["payment_code"];
$order_user_id = $_POST["order_user_id"];
$order_trip_id = $_POST["order_trip_id"];
$order_receipt_id = $_POST["order_receipt_id"];
$order_branch_id = $_POST["order_branch_id"];

try{
    $user_check = $db->query("SELECT * FROM Users WHERE user_id = '$order_user_id'");
    $user_num = mysqli_num_rows($user_check);
    $trip_check = $db->query("SELECT * FROM Trip WHERE trip_id = '$order_trip_id'");
    $trip_num = mysqli_num_rows($trip_check);
    $receipt_check = $db->query("SELECT * FROM Shopping WHERE receipt_id = '$order_receipt_id'");
    $receipt_num = mysqli_num_rows($receipt_check);
    $branch_check = $db->query("SELECT * FROM Branch WHERE branch_id = '$order_branch_id'");
    $branch_num = mysqli_num_rows($branch_check);

    if ($user_num ==0){
        $error = "User ID does not exist";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    } else if ($trip_num == 0){
        $error = "Trip ID does not exist";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    } else if ($receipt_num == 0){
        $error = "Receipt ID does not exist";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    } else if ($branch_num == 0){
        $error = "Branch ID does not exist";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    } else if (!is_numeric($order_price) || !is_numeric($payment_code)){
        $error = "Please enter numbers for total and payment code";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    } else {
        $insert = "INSERT into Orders (date_issued, date_completed, order_price, payment_code, user_id, trip_id, receipt_id, branch_id)
        VALUES ('$date_issued', '$date_completed', $order_price, $payment_code, $order_user_id, $order_trip_id, $order_receipt_id, $order_branch_id)";
        mysqli_query($db, $insert);
        $message = "Data inserted successfully";
        $s = "INSERT into messages(message_text) values ('$message')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    }
    

} catch(Throwable $e){
    $error = "Insert failed";
    $s = "INSERT into error(error_text) values ('$error')";
    mysqli_query($db,$s);
    header("Location: ../insert.php");
}

mysqli_close($db);
?>