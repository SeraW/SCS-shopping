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
    mysqli_close($db);
    $_SESSION['error'] = "Incorrect Username or Password.";
}else{
    $_SESSION['username'] = $_POST['username'];
    header("Location: ../home.php");
}
mysqli_close($db);
?>