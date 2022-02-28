<!DOCTYPE html>
<html>

<head>
    <title>SCS | Thank You</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./css/invoicecomplete.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<?php include 'navbar.php'; ?>

<body>
    <div id="invoice-container">
        <div id="invoice-box">
            <span><i class="large material-icons">thumb_up</i></span>
            <h1>Thank you! Your order has been recieved.</h1>
            <p>You will be recieving a confirmation email with order details.</p>
            <a class="waves-effect waves-light btn" href="products.php" style="background: #149BBB"><i class="material-icons left">shopping_basket</i>More Products</a>
        </div>
    </div>
</body>

</html>