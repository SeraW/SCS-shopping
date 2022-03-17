<!DOCTYPE html>
<html>

<head>
    <title>SCS | Products</title>
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

<?php include 'navbar.php';
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>

<script src="products.js"></script>

<body>
    <div class="row">
        <div class="col s12 m12 l8">
            <h1>Products</h1>
            <div id="productlist">
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
                    echo '
                        <div class="card" id=' . $counter . ' draggable="true" ondragstart="drag(this.id)">
                            <div class="card-image valign-wrapper" id="productsonly">
                                <img class="img-products" id="img' . $counter . '" src="./' . $img . '">
                                <a class="btn-floating halfway-fab" onClick="cartBtn(' .$counter. ')" style="background: #149BBB"><i class="material-icons left">add</i></a>   
                            </div>
                            <div class="card-content">
                                <span class="cardspan" style="color:black; font-weight:bold" class="card-title" id="name' . $counter . '">' . $name . '</span>
                                <p id="price' . $counter . '">$' . $price . '</p>
                            </div>
                    </div>';
                }
            }
            ?>
            </div>
        </div>

        <div class="col s12 m12 l4" id="full" ondrop="drop(event)" ondragover="allowDrop(event)">
            <div id="div1">
                <h1>Cart</h1>
                <form name="myform">
                    <input type="hidden" name="customer" />
                </form>
                <?php
                if (isset($_SESSION["username"])) {
                    $db = mysqli_connect("localhost", "root", "", "project");
                    if ($db->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $counter = 0;

                    if (isset($_COOKIE['cart'])) {
                        $finalcart = json_decode($_COOKIE['cart'], true);
                        for ($i = 0; $i < count($finalcart); $i++) {
                            $commandText = "SELECT prod_name, prod_price, img_url FROM product WHERE prod_id=$finalcart[$i]";
                            $result = mysqli_query($db, $commandText);
                            $row = mysqli_fetch_row($result);

                            $counter += 1;
                            $name = $row[0];
                            $price = $row[1];
                            $img = $row[2];

                            echo '<div class="card horizontal" id="card' . $counter . '">
                                <div class="card-image cart-img">
                                    <img class="cartimg" src="' . $img . '">
                                </div>
                                <div class="card-stacked">
                                    <div class="card-content">
                                        <span class-"cardspan" style="color:black; font-weight:bold" class="card-title">' . $name . '</span>
                                        <p>$' . $price . '</p>
                                    </div>
                                    <div class="card-action" >
                                        <a href="javascript:void(0);" id="remove' . $counter . '" onclick="removeCart(' . $counter . ');" style="color:#149BBB"><i class="material-icons">delete</i></a>
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php include "productfooter.php"?>