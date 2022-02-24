<!DOCTYPE html>
<html>

<head>
    <title>SCS | Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./css/products.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<?php include 'navbar.php' ?>

<script>
    let id = 0;
    let cartCount = 0;
    const cart = [];

    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        id = ev;
    }

    function drop(ev) {
        var img = document.getElementById(`img${id}`).src;
        var productName = document.getElementById(`name${id}`).textContent;
        var productCost = document.getElementById(`price${id}`).textContent;
        cartCount += 1;
        shoppingCart(id);
        var html = `<div class="card horizontal small" id="card${cartCount}">
                        <div class="card-image">
                            <img src="${img}">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <span style="color:black; font-weight:bold" class="card-title">${productName}</span>
                                <p>${productCost}</p>
                            </div>
                            <div class="card-action">
                                <a href="javascript:void(0);" onclick="removeCart(${cartCount});">Remove From Cart</a>
                            </div>
                        </div>
                    </div>`
        document.querySelector('#div1').insertAdjacentHTML('beforeend', html);
        jsonCart = JSON.stringify(cart);
    }

    function removeCart(removeID) {
        document.getElementById(`card${removeID}`).remove();
    }

    function shoppingCart(value) {
        cart.push(value);
    }

    function WriteCookie() {
        cookievalue = escape(document.myform.customer.value) + ";";
        document.cookie = "cart=" + jsonCart;
        window.location.href = "http://localhost/CPS630/Project/shoppingcart.php";

    }
</script>

<body>
    <div class="row">
        <div class="col s9">
            <h1>Products</h1>
            <?php
            if (isset($_SESSION["username"])) {
                $db = mysqli_connect("localhost", "root", "", "project");
                if ($db->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $commandText = "SELECT prod_name, prod_price, img_url FROM product";
                $result = mysqli_query($db, $commandText);

                $counter = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $counter += 1;
                    $name = $row["prod_name"];
                    $price = $row["prod_price"];
                    $img = $row["img_url"];
                    echo '<div class="col s12 m6 l3">
                        <div class="card large" id=' . $counter . ' draggable="true" ondragstart="drag(this.id)">
                            <div class="card-image">
                                <img class="responsive-img img-products" id="img' . $counter . '" src="./' . $img . '">
                            </div>
                            <div class="card-content">
                                <span style="color:black; font-weight:bold" class="card-title" id="name' . $counter . '">' . $name . '</span>
                                <p id="price' . $counter . '">$' . $price . '</p>
                            </div>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>

        <div class="col s3" id="full" ondrop="drop(event)" ondragover="allowDrop(event)">
            <div id="div1">
                <h1>Shopping Cart</h1>
                <form name="myform">
                    <input type="hidden" name="customer" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>