<?php
session_start();
?>
<?php
$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_POST["username"];
$password = $_POST["password"];


$result = $db->query("SELECT * FROM users WHERE login_id = '$username' AND login_password = '$password'");

$num = mysqli_num_rows($result);

if ($num == 0){
    header("Location: ../login.php");
    $error = "Invalid Username or Password.";
    $s = "INSERT into error(error_text) values ('$error')";
    mysqli_query($db,$s);
    mysqli_close($db);
}else{
    $_SESSION['username'] = $_POST['username'];
    header("Location: ../home.php");
}
mysqli_close($db);
?>