<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php
$db = mysqli_connect("localhost", "root", "", "lab8");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['resgister'])){ 
    $username = $_POST['username'];
    $password = ($_POST['password']);
    $message = "Plain password: ".$password;
    $reg = "INSERT INTO usersPlain(username, password) VALUES ('$username', '$password')";
    mysqli_query($db, $reg);
}  

if(isset($_POST['login'])){ 
    $username = $_POST['username'];
    $password = ($_POST['password']);
    $check = $db -> query("SELECT * FROM usersPlain WHERE username='$username' AND password='$password'");
    $num = mysqli_num_rows($check);
    if($num !=0){
        $success = "success! you logged in";
    }else{
        $success = "failed to log in";
    }
}

?>
<body>
<h1>Register - Plaintext</h1>
<form action="" method="post">
    <label for="fname">Username</label><br>
    <input type="text" name="username"/><br>
    <label for="fname">Password</label><br>
    <input type="text" name="password"/>
    <input type="submit" name="resgister"/>
</form>
<?php
    if(isset($message)){echo $message . "<br>";}
?>
<h1>Login</h1>
<form action="" method="post">
    <label for="fname">Username</label><br>
    <input type="text" name="username"/><br>
    <label for="fname">Password</label><br>
    <input type="text" name="password"/>
    <input type="submit" name="login"/>
</form>
<?php
    if(isset($success)){echo $success . "<br>";}
?>    
</body>
</html>