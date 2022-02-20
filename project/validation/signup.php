<?php
session_start();
?>
<?php
$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$phone = $_POST["phone"];
$addr = $_POST["address"];
$postal = $_POST["postal"];

$result = $db->query("SELECT * FROM users WHERE login_id = '$username'");

$num = mysqli_num_rows($result);

if ($num == 1){
    header("Location: ../register.php");
    mysqli_close($db);
    $_SESSION['error'] = "Username is already taken.";
}else{
    $_SESSION['username'] = $_POST['username'];
    $reg = "INSERT into users(first_name, last_name, phone, email, addy, postal, login_id, login_password, balance, admin_val) values ('$fname','$lname','$phone','$email','$addr','$postal','$username','$password', 0, false)";
    mysqli_query($db, $reg);
    header("Location: ../home.php");
}
mysqli_close($db);
?>