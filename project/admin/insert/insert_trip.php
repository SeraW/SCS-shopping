<?php
$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$destination_code = $_POST["destination_code"];
$trip_price = $_POST["trip_price"];
$distance = $_POST["distance"];
$branch_id = $_POST["trip_branch_id"];
$car_id = $_POST["trip_car_id"];

try {
    $branch_check = $db->query("SELECT * FROM Branch WHERE branch_id = '$branch_id'");
    $branch_num = mysqli_num_rows($branch_check);
    $car_check = $db->query("SELECT * FROM Car WHERE car_id = '$car_id'");
    $car_num = mysqli_num_rows($car_check);

    if(!is_numeric($destination_code) || !is_numeric($distance) || !is_numeric($trip_price)){
        $error = "Please enter numbers for destination code, total, and distance";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");

    } else if($branch_num == 0){
        $error = "Branch ID does not exist";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");

    } else if($car_num == 0){
        $error = "Car ID does not exist";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");

    } else {
        $insert = "INSERT into trip(destination_code, trip_price, distance, branch_id, car_id)
        VALUES ($destination_code, $trip_price, $distance, $branch_id, $car_id)";
        mysqli_query($db, $insert);
        $message = "Data inserted successfully";
        $s = "INSERT into messages(message_text) values ('$message')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    }
} catch(throwable $e){
    $error = "Insert failed";
    $s = "INSERT into error(error_text) values ('$error')";
    mysqli_query($db,$s);
    header("Location: ../insert.php");
}

mysqli_close($db);
?>