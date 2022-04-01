<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
session_start();
if (empty($_POST['username']) && empty($_POST['password'])) die();
$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    echo "adasdasas";
    die("Connection failed: asdasdas" . $conn->connect_error);
    
}


$username = $_POST["username"];
$password = $_POST["password"];


$result = $db->query("SELECT * FROM users WHERE login_id = '$username' AND login_password = '$password'");

$num = mysqli_num_rows($result);

if ($num == 0){
    $error = "Invalid Username or Password.";
    echo json_encode(array("sent"=> false));
}else{
    $_SESSION['username'] = $_POST['username'];
    echo json_encode(array("sent"=> true));
}
mysqli_close($db);
?>