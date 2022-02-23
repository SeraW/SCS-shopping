<?php
$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$phone = $_POST["phone"];
$postal = $_POST["postal"];
$addy = $_POST["addy"];
$email = $_POST["email"];
$login_id = $_POST["login_id"];
$login_password = $_POST["login_password"];
$balance = $_POST["balance"];
$admin_val = $_POST["admin_val"];
$remove = str_replace("-", "", $phone);

/*echo $first_name ." " . $last_name . " " .$phone ." " . $postal ." " . $addy ." " . $email ." " . $login_id . " " .$login_password ." " . $balance ." " . $admin_val . " " . $remove;

*/
try{
    $login_check = $db->query("SELECT * FROM Users WHERE login_id = '$login_id'");
    $login_num = mysqli_num_rows($login_check);


    if (!is_numeric($remove) || !is_numeric($balance)){
        $error = "Please enter numbers for phone number and balance";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");

    } else if ($login_num == 1){
        $error = "Username already taken";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");

    } else if (strtolower($admin_val) != "true" && strtolower($admin_val) != "false"){
        $error = "Please enter true or false for admin value";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");

    } else {
        $insert = "INSERT into Users(first_name, last_name, phone, email, addy, postal, login_id, login_password, balance, admin_val)
        VALUES ('$first_name', '$last_name', '$phone', '$email', '$addy', '$postal', '$login_id', '$login_password', $balance, $admin_val)";
        mysqli_query($db, $insert);
        $message = "Data inserted successfully";
        $s = "INSERT into messages(message_text) values ('$message')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    }
} catch(throwable $e){
   echo $e;
}

mysqli_close($db);
?>