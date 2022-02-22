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
    <link rel="stylesheet" href="css/navbar.css" type="text/css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
<ul id="dropdown" class="dropdown-content">
    <li><a href="./admin/insert.php">Insert</a></li>
    <li><a href="./admin/delete.php">Delete</a></li>
    <li><a href="./admin/select.php">Select</a></li>
    <li><a href="./admin/update.php">Update</a></li>
</ul>
<ul id="mobiledrop" class="dropdown-content">
    <li><a href="./admin/insert.php">Insert</a></li>
    <li><a href="./admin/delete.php">Delete</a></li>
    <li><a href="./admin/select.php">Select</a></li>
    <li><a href="./admin/update.php">Update</a></li>
</ul>
<nav class="z-depth-0">
    <div class="nav-wrapper">
      <a href="home.php" class="brand-logo">S<span class="material-icons black-icons" id="globe">travel_explore</span>S</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons" id = "hamburger">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="types.php">Services</a></li>
        <li><a href="reviews.php">Reviews</a></li>
        <li><a href="contact.php">Contact</a></li>
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
              echo "<li><a class='dropdown-trigger' href='#!' data-target='dropdown'>Admin<i class='material-icons right'>arrow_drop_down</i></a></li>";
              echo "<li><a href='./validation/logout.php'>Logout</a></li>";
              echo "<li><a href='#!'><i class='material-icons'>shopping_cart</i></a></li>";
            } else {
              echo "<li><a href='./validation/logout.php'>Logout</a></li>";
              echo "<li><a href='#!'><i class='material-icons'>shopping_cart</i></a></li>";
            }
          } else{
            echo "<li><a href='login.php'>Login</a></li>";
            echo "<li><a href='register.php'>Register</a></li>";
          }
        ?>
      </ul>
    </div>
  </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="types.php">Services</a></li>
        <li><a href="reviews.php">Reviews</a></li>
        <li><a href="contact.php">Contact</a></li>
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
              echo "<li><a class='dropdown-trigger' href='#!' data-target='mobiledrop'>Admin<i class='material-icons right'>arrow_drop_down</i></a></li>";
              echo "<li><a href='./validation/logout.php'>Logout</a></li>";
              echo "<li><a href='#!'><i class='material-icons'>shopping_cart</i></a></li>";
            } else {
              echo "<li><a href='./validation/logout.php'>Logout</a></li>";
              echo "<li><a href='#!'><i class='material-icons'>shopping_cart</i></a></li>";
            }
          } else{
            echo "<li><a href='login.php'>Login</a></li>";
            echo "<li><a href='register.php'>Register</a></li>";
          }
        ?>
    </ul>
          

</body>
</html>

<script>
$(document).ready(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown({
      coverTrigger: false
    });
  });
</script>