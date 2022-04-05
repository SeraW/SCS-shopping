<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php
function generateRandomSalt(){
    return base64_encode(random_bytes(12));
}

$db = mysqli_connect("localhost", "root", "", "lab8");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['resgister'])){ 
    $username = $_POST['username'];
    $password= $_POST['password'];
    $salt = generateRandomSalt();
    $password = md5($password.$salt);
    $message = "Hashed and salted password: ".$password;
    $reg = "INSERT INTO usersSalt(username, login_salt, password) VALUES ('$username', '$salt', '$password')";
    mysqli_query($db, $reg);
}

if(isset($_POST['login'])){ 
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = $db -> query("SELECT login_salt FROM userssalt WHERE username = '$username'");

    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_row($result);
    if (!$result || $num == 0){
        $success = "Invalid Username or Password.";
    }else{
        $salt = $row[0];
        $password = md5($password.$salt);
    }

   $result = $db->query("SELECT * FROM usersSalt WHERE username = '$username' AND password = '$password'");

    $num = mysqli_num_rows($result);

    if ($num == 0){
        $success = "Invalid Username or Password.";
    }else{
       $success = "you've logged in!";
    }
    
}

?>

<body>
<h1>Register - Salt</h1>
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