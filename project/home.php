<!DOCTYPE html>
<html>
<head>
    <title>SCS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./css/home.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<?php include 'navbar.php' ?>

<body>
    <div id="home">
        <div id ="home-info">
            <h1>Welcome to <span class="highlight">Smart Customer Services.</span></h1>
            <h2>Learn more about our Products and Services.</h2>
            <a class="waves-effect waves-light btn" href="products.php" style="background: #149BBB"><i class="material-icons left">shopping_basket</i>Products</a>
        </div>
        <img src="./img/homeimg.svg" alt="Ecommerce" width="400" height="400">
    </div>
    <div id = "about-sec">
        <div id = "about-area">
            <h2>Want to learn more about <span class="highlight">us?</span></h2>
            <a class="waves-effect waves-light btn" href="about.php" style="background: #149BBB"><i class="material-icons left">assignment</i>About Us</a>
        </div>  
    </div>
    <div id="contact-sec">
        <div id= "contact-area">
            <h1>Got any <span class="highlight">questions?</span></h1>
            <h2>Find our contact information here.</h2>
            <a class="waves-effect waves-light btn" href="contact.php" style="background: #149BBB"><i class="material-icons left">question_answer</i>Contact Us</a>
        </div>
        <img src="./img/question.svg" style="border-radius:5px" alt="Contact-Us" width="400" height="400">
    </div>
</body>
</html>