<!DOCTYPE html>
<html>

<head>
    <title>SCS | Shopping Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./css/shoppingcart.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<?php include 'navbar.php';
if (isset($_SESSION["username"])) {
    $db = mysqli_connect("localhost", "root", "", "project");
    if ($db->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $user = $_SESSION["username"];
    $s = "SELECT addy FROM users WHERE login_id = '$user'";
    $result = mysqli_query($db, $s);
    $row = mysqli_fetch_row($result);
} else {
    header('Location: login.php');
}
?>

<script>
    function initMap() {
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 7,
            center: {
                lat: 43.65,
                lng: -79.38
            },
        });

        directionsRenderer.setMap(map);

        const onChangeHandler = function() {
            calculateAndDisplayRoute(directionsService, directionsRenderer);
        };

        document.getElementById("end").addEventListener("change", onChangeHandler);
    }

    function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        directionsService
            .route({
                origin: {
                    query: "<?php echo $row[0]; ?>",
                },
                destination: {
                    query: document.getElementById("end").value,
                },
                travelMode: google.maps.TravelMode.DRIVING,
            })
            .then((response) => {
                directionsRenderer.setDirections(response);
            })
            .catch((e) => window.alert("Directions request failed due to " + status));
    }
</script>

<script src="shoppingcart.js"></script>

<body onload="initMap()">
    <div class="row">
        <div class="container">
            <div class="col s12 m12 l9">
                <h1>Checkout</h1>
                <div id="mapdiv" class="col s12 m12 l9">
                    <div id="map"></div>
                </div>
                <form id="order" action="process_order.php" method="post">

                    <div class="input-field col s12">
                        <select name="end" id="end" required>
                            <option value="" disabled selected="">Choose a Branch</option>
                            <?php
                            $commandText = "SELECT branch_addy FROM branch";
                            $result = mysqli_query($db, $commandText);

                            //$counter = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                //$counter += 1;
                                $branch_addy = $row["branch_addy"];
                                echo '<option value="' . $branch_addy . '">' . $branch_addy . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <select name="car" id="car" required>
                            <option value="" disabled selected="">Choose a Car</option>
                            <?php
                            $commandText = "SELECT model, availibility, car_id FROM car";
                            $result = mysqli_query($db, $commandText);

                            //$counter = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                //$counter += 1;
                                $model = $row["model"];
                                $available = $row["availibility"];
                                $car_id = $row["car_id"];
                                if ($available == "Available") {
                                    echo '<option value="' . $car_id . '">' . $model . ' - (' . $available . ')</option>';
                                }
                            };
                            ?>
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <select name="date" id="date" required>
                            <option value="" disabled selected="">Choose a Delivery Option</option>
                            <option value="7">FREE - No-Rush Shipping</option>
                            <option value="1">$6.99 - One-Day Shipping</option>
                            <option value="2">$5.99 - Two-Day Shipping</option>
                        </select>
                    </div>
                    <input type="hidden" id="FinalValue" name="FinalValue" value="128.98">
                    <button class="btn waves-effect waves-light save-button" type="submit" name="trip_submit" style="margin-top:30px;background:#149BBB">Place Order</button>
                </form>

            </div>


            <div class="col s12 m12 l3" id="full">
                <div id="div1">
                    <h1>Cart</h1>
                    <div class="card-panel horizontal medium" id="card' . $counter . '">
                        <div class="card-stacked">
                            <div class="card-content">
                                <span style="color:black; font-weight:bold; font-size: 175%" class="card-title">Summary</span>
                                <?php
                                $counter = 0;
                                if (isset($_COOKIE['cart'])) {
                                    $finalcart = json_decode($_COOKIE['cart'], true);
                                    $total = 0;
                                    for ($i = 0; $i < count($finalcart); $i++) {
                                        $commandText = "SELECT prod_name, prod_price, img_url FROM product WHERE prod_id=$finalcart[$i]";
                                        $result = mysqli_query($db, $commandText);
                                        $row = mysqli_fetch_row($result);

                                        $price = $row[1];
                                        $total += $price;
                                    }
                                    echo
                                    '
                                    <p id="subtotal">Subtotal: $' . number_format((float)$total, 2, '.', '') . '</p>
                                    <p id="shipping">Shipping & Handling: $0</p>
                                    <p>Taxes: $' . number_format((float)$total * .13, 2, '.', '') . '</p>
                                    <p id="total">TOTAL: $' . number_format((float)$total * 1.13, 2, '.', '') . '</p>
                                    ';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
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

                            echo
                            '<div class="card horizontal small" id="card' . $counter . '">
                            <div class="card-image">
                                <img src="' . $img . '">
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                    <span style="color:black; font-weight:bold" class="card-title">' . $name . '</span>
                                    <p>$' . $price . '</p>
                                </div>
                            </div>
                        </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    </script>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf5iT2KI8tPal0EAflGoI2WNfnXXp3nHc&callback=initMap&v=weekly" async></script>

</body>
</html>
<?php include "productfooter.php"?>