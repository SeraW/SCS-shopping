<?php
$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$car_model = $_POST["car_model"];
$car_aval = $_POST["car_aval"];

try {
    $insert = "INSERT into car(model, availibility) values ('$car_model', '$car_aval')";
    mysqli_query($db, $insert);
    $message = "Data inserted successfully";
    $s = "INSERT into messages(message_text) values ('$message')";
    mysqli_query($db,$s);
    header("Location: ../insert.php");

} catch(Throwable $e){
    $error = "Insert failed";
    $s = "INSERT into error(error_text) values ('$error')";
    mysqli_query($db,$s);
    header("Location: ../insert.php");
}
mysqli_close($db);
?>