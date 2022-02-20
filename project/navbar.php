<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
<nav class="z-depth-0">
    <div class="nav-wrapper">
      <a href="home.php" class="brand-logo">S<span class="material-icons" id="globe">travel_explore</span>S</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="types.php">Types of Services</a></li>
        <li><a href="reviews.php">Reviews</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <?php
          if (isset($_SESSION["username"])){
            $db = mysqli_connect("localhost", "root", "", "project");
            if ($db->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $user = $_SESSION["username"];
            $s = "SELECT admin_val FROM users WHERE login_id = '$user'";
            $result = mysqli_query($db, $s);
            $row = mysqli_fetch_row($result);
            if ($row[0] == 1){
              echo "<li><a href='admin.php'>Admin</a></li>";
              echo "<li><a href='./validation/logout.php'>Logout</a></li>";
            } else {
              echo "<li><a href='./validation/logout.php'>Logout</a></li>";
            }
          } else{
            echo "<li><a href='login.php'>Sign In</a></li>";
            echo "<li><a href='register.php'>Sign Up</a></li>";
          }
        ?>
      </ul>
    </div>
  </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="types.php">Types of Services</a></li>
        <li><a href="reviews.php">Reviews</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <?php
          if (isset($_SESSION["username"])){
            $db = mysqli_connect("localhost", "root", "", "project");
            if ($db->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $user = $_SESSION["username"];
            $s = "SELECT admin_val FROM users WHERE login_id = '$user'";
            $result = mysqli_query($db, $s);
            $row = mysqli_fetch_row($result);
            if ($row[0] == 1){
              echo "<li><a href='admin.php'>Admin</a></li>";
              echo "<li><a href='./validation/logout.php'>Logout</a></li>";
            } else {
              echo "<li><a href='./validation/logout.php'>Logout</a></li>";
            }
          } else{
            echo "<li><a href='login.php'>Sign In</a></li>";
            echo "<li><a href='register.php'>Sign Up</a></li>";
          }
        ?>
    </ul>
          

</body>
</html>

<script>
$(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>