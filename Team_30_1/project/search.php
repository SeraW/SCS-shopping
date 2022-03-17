<!DOCTYPE html>
<html>
<head>
    <title>SCS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./css/search.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<?php include 'navbar.php' ?>

<body>
    <div id="searchbox">
        <div id="headings">
            <h1>Order <span>Tracking</span></h1>
        </div>
        <form action="" method="POST">
            <label for="userid">User ID</label>
            <input type="text" id="userid" name="userid"><br>
            <button class="btn waves-effect waves-light track-button" type="submit" name="track" style="margin-top:30px;background:#149BBB">Search
                <i class="material-icons right">send</i>
            </button><br>
        </form>
        <form action="" method = "POST">
            <label for="orderid">Order ID</label>
            <input type="text" id="orderid" name="orderid"><br>
            <button class="btn waves-effect waves-light track-button" type="submit" name="trackOrder" style="margin-top:30px;background:#149BBB">Search
                <i class="material-icons right">send</i>
            </button><br>
        </form>
        <?php
            $db = mysqli_connect("localhost", "root", "", "project");
            if ($db->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if (isset($_POST['track'])){
                if (isset($_POST['userid'])){
                    try{
                        $selected_table = $_POST['userid'];
                        $get_col = "SELECT order_id, date_issued, date_completed, order_price FROM orders WHERE user_id ='$selected_table'";
                        $result = $db->query($get_col);
                        echo "<div>
                                <table class='responsive-table striped centered'>
                                    <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Date Issued</th>
                                        <th>Date Completed</th>
                                        <th>Order Price</th>
                                    </tr>
                                    </thead>";
                                    echo "<tbody>";
                                    if (mysqli_num_rows($result) > 0) {
                                        while($data = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $data['order_id'] . "</td>";
                                            echo "<td>" . $data['date_issued'] . "</td>";
                                            echo "<td>" . $data['date_completed'] . "</td>";
                                            echo "<td>" . $data['order_price'] . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    echo "</tbody>
                                </table></div>";
                    } catch(Throwable $e){
                        echo "<p id='error'>Table could not be displayed</p>";
                    }
                }
                
            }
            if (isset($_POST['trackOrder'])){
                if (isset($_POST['orderid'])){
                    try{
                        $selected_table = $_POST['orderid'];
                        $get_col = "SELECT order_id, date_issued, date_completed, order_price FROM orders WHERE order_id ='$selected_table'";
                        $result = $db->query($get_col);
                        echo "<div>
                                <table class='responsive-table striped centered'>
                                    <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Date Issued</th>
                                        <th>Date Completed</th>
                                        <th>Order Price</th>
                                    </tr>
                                    </thead>";
                                    echo "<tbody>";
                                    if (mysqli_num_rows($result) > 0) {
                                        while($data = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $data['order_id'] . "</td>";
                                            echo "<td>" . $data['date_issued'] . "</td>";
                                            echo "<td>" . $data['date_completed'] . "</td>";
                                            echo "<td>" . $data['order_price'] . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    echo "</tbody>
                                </table></div>";
                    } catch(Throwable $e){
                        echo "<p id='error'>Table could not be displayed</p>";
                    }
                }
                
            }
        ?>
    </div>
</body>
</html>

<?php include "greyfooter.php"?>