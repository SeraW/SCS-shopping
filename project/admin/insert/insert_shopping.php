<?php
$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$shopping_price = $_POST["shopping_price"];
$branch_id = $_POST["shopping_branch_id"];

try{
    $branch_check = $db->query("SELECT * FROM Branch WHERE branch_id = '$branch_id'");
    $branch_num = mysqli_num_rows($branch_check);

    if ($branch_num ==0){
        $error = "Branch ID does not exist";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    } else if (!is_numeric($shopping_price)){
        $error = "Please enter numbers for total";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    } else {
        $insert = "INSERT into shopping(shopping_price, branch_id) values ($shopping_price, $branch_id)";
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