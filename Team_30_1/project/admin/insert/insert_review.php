<?php
$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$review_text = $_POST["review_text"];
$user_id = $_POST["review_user_id"];

try {
    $user_check = $db->query("SELECT * FROM Users WHERE user_id = '$user_id'");
    $user_num = mysqli_num_rows($user_check);

    if ($user_num ==0){
        $error = "User ID does not exist";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    } else {
        $insert = "INSERT into review(review_text, user_id) values ('$review_text', $user_id)";
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