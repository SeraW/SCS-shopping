<?php
$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$prod_name = $_POST["prod_name"];
$prod_price = $_POST["prod_price"];
$img_url = $_POST["img_url"];

try{
    if (!is_numeric($prod_price)){
        $error = "Please enter numbers for product price";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    } else {
        $insert = "INSERT into product(prod_name, prod_price, img_url) values ('$prod_name', $prod_price, '$img_url')";
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