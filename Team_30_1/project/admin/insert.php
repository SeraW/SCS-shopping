<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>SCS | Insert </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/insert.css" type="text/css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<?php include "admin_header.php"?>

<body>

<div id="insertheight-div">
  <div class="container">
      <div class="row">
          <h1>Database <span class="highlight">Administration</span></h1>
          <h2>Insert data below</h2>
      </div>
      <div class="row table_select">
          <div class="col s12 m6 offset-m3">
            <select class="browser-default choice" id="selection">
              <option value="" disabled selected>Select table</option>
              <?php
                $db = mysqli_connect("localhost", "root", "", "project");
                if ($db->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SHOW TABLES";
                foreach ($db->query($sql) as $row){
                  $text= ucfirst($row['Tables_in_project']);
                  if ($text == "Error" || $text== "Messages"){
                    continue;
                  }
                  echo  "<option value='$row[Tables_in_project]'> $text</option>"; 
                }
              ?>
            </select>
          </div>
      </div>  
  </div>

  <!--Branch Form-->

  <div class="container" id="branch_form">
      <form name="branch" id="branch" action="./insert/insert_branch.php" method="POST">
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="branch_addy" name="branch_addy" type="text" class="validate" required>
            <label for="branch_addy">Address</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m5 offset-m1">
            <input id="lat" name ="lat" type="text" class="validate" required>
            <label for="lat">Latitude</label>
          </div>
          <div class="input-field col s12 m5">
            <input id="lon" name="lon" type="text" class="validate" required>
            <label for="lon">Longitude</label>
          </div>
        </div>
        <div class="row">
        <div class="col s12 m6 offset-m4">
          <button class="btn waves-effect waves-light save-button" type="submit" name="branch_submit" style="margin-top:30px;background:#149BBB">Insert</button>
          </div>
        </div>
        <div class="row"></div>
      </form>
  </div>


  <!--Car Form-->

  <div class="container" id="car_form">
      <form name="car" id="car" action="./insert/insert_car.php" method="POST">
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="car_model" name="car_model" type="text" class="validate" required>
            <label for="car_model">Car Model</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="car_aval" name="car_aval" type="text" class="validate" required>
            <label for="car_aval">Car availibility</label>
          </div>
        </div>
        <div class="row">
        <div class="col s12 m6 offset-m4">
          <button class="btn waves-effect waves-light save-button" type="submit" name="car_submit" style="margin-top:30px;background:#149BBB">Insert</button>
          </div>
        </div>
        <div class="row"></div>
      </form>
  </div>

  <!--Order Form-->

  <div class="container" id="orders_form">
      <form name="orders" id="orders" action="./insert/insert_order.php" method="POST">
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="date_issued" name="date_issued" type="text" class="validate" required>
            <label for="date_issued">Date issued YYYY-MM-DD</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="date_completed" name="date_completed" type="text" class="validate" required>
            <label for="date_completed">Date completed YYY-MM-DD</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m5 offset-m1">
            <input id="order_price" name="order_price" type="text" class="validate" required>
            <label for="order_price">Total</label>
          </div>
          <div class="input-field col s12 m5">
            <input id="payment_code" name="payment_code" type="text" class="validate" required>
            <label for="payment_code">Payment code</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m5 offset-m1">
            <input id="order_user_id" name="order_user_id" type="text" class="validate" required>
            <label for="order_user_id">User ID</label>
          </div>
          <div class="input-field col s12 m5">
            <input id="order_trip_id" name="order_trip_id" type="text" class="validate" required>
            <label for="order_trip_id">Trip ID</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m5 offset-m1">
            <input id="order_receipt_id" name="order_receipt_id" type="text" class="validate" required>
            <label for="order_receipt_id">Receipt ID</label>
          </div>
          <div class="input-field col s12 m5">
            <input id="order_branch_id" name="order_branch_id" type="text" class="validate" required>
            <label for="order_branch_id">Branch ID</label>
          </div>
        </div>
        <div class="row">
        <div class="col s12 m6 offset-m4">
          <button class="btn waves-effect waves-light save-button" type="submit" name="order_submit" style="margin-top:30px;background:#149BBB">Insert</button>
          </div>
        </div>
      </form>
  </div>

  <!--Product Form-->

  <div class="container" id="product_form">
      <form name="product" id="product" action="./insert/insert_product.php" method="POST">
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="prod_name" name="prod_name" type="text" class="validate" required>
            <label for="prod_name">Product name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="prod_price" name="prod_price" type="text" class="validate" required>
            <label for="prod_price">Product price</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="img_url" name="img_url" type="text" class="validate" required>
            <label for="img_url">Image url</label>
          </div>
        </div>
        <div class="row">
        <div class="col s12 m6 offset-m4">
          <button class="btn waves-effect waves-light save-button" type="submit" name="prod_submit" style="margin-top:30px;background:#149BBB">Insert</button>
          </div>
        </div>
      </form>
  </div>

  <!--Review Form-->

  <div class="container" id="review_form">
      <form name="review" id="review" action="./insert/insert_review.php" method="POST">
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="review_text" name="review_text" type="text" class="validate" required>
            <label for="review_text">Review text</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="review_user_id" name="review_user_id" type="text" class="validate" required>
            <label for="review_user_id">User ID</label>
          </div>
        </div>
        <div class="row">
        <div class="col s12 m6 offset-m4">
          <button class="btn waves-effect waves-light save-button" type="submit" name="prod_submit" style="margin-top:30px;background:#149BBB">Insert</button>
          </div>
        </div>
      </form>
  </div>

  <!--Shopping Form-->

  <div class="container" id="shopping_form">
      <form name="shopping" id="shopping" action="./insert/insert_shopping.php" method="POST">
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="shopping_price" name="shopping_price" type="text" class="validate" required>
            <label for="shopping_price">Total</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="shopping_branch_id" name="shopping_branch_id" type="text" class="validate" required>
            <label for="shopping_branch_id">Branch ID</label>
          </div>
        </div>
        <div class="row">
        <div class="col s12 m6 offset-m4">
          <button class="btn waves-effect waves-light save-button" type="submit" name="prod_submit" style="margin-top:30px;background:#149BBB">Insert</button>
          </div>
        </div>
      </form>
  </div>

  <!--Trip Form-->

  <div class="container" id="trip_form">
      <form name="trip" id="trip" action="./insert/insert_trip.php" method="POST">
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="destination_code" name="destination_code" type="text" class="validate" required>
            <label for="destination_code">Destination code</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m5 offset-m1">
            <input id="trip_price" name="trip_price" type="text" class="validate" required>
            <label for="trip_price">Total</label>
          </div>
          <div class="input-field col s12 m5">
            <input id="distance" name="distance" type="text" class="validate" required>
            <label for="distance">Distance</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m5 offset-m1">
            <input id="trip_branch_id" name="trip_branch_id" type="text" class="validate" required>
            <label for="trip_branch_id">Branch ID</label>
          </div>
          <div class="input-field col s12 m5">
            <input id="trip_car_id" name="trip_car_id" type="text" class="validate" required>
            <label for="trip_car_id">Car ID</label>
          </div>
        </div>
        <div class="row">
        <div class="col s12 m6 offset-m4">
          <button class="btn waves-effect waves-light save-button" type="submit" name="trip_submit" style="margin-top:30px;background:#149BBB">Insert</button>
          </div>
        </div>
      </form>
  </div>

  <!--Users Form-->

  <div class="container" id="users_form">
      <form name="users" id="users" action="./insert/insert_users.php" method="POST">
        <div class="row">
          <div class="input-field col s12 m5 offset-m1">
            <input id="first_name" name="first_name" type="text" class="validate" required>
            <label for="first_name">First name</label>
          </div>
          <div class="input-field col s12 m5">
            <input id="last_name" name="last_name" type="text" class="validate" required>
            <label for="last_name">Last name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m5 offset-m1">
            <input id="phone" name="phone" type="text" class="validate" required>
            <label for="phone">Phone number</label>
          </div>
          <div class="input-field col s12 m5">
            <input id="postal" name="postal" type="text" class="validate" required>
            <label for="postal">Postal code</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="addy" name="addy" type="text" class="validate" required>
            <label for="addy">Address</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="email" name="email" type="email" class="validate" required>
            <label for="email">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="login_id" name="login_id" type="text" class="validate" required>
            <label for="login_id">Username</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m10 offset-m1">
            <input id="login_password" name="login_password" type="password" class="validate" required>
            <label for="login_password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m5 offset-m1">
            <input id="balance" name="balance" type="text" class="validate" required>
            <label for="balance">Balance</label>
          </div>
          <div class="input-field col s12 m5">
            <input id="admin_val" name="admin_val" type="text" class="validate" required>
            <label for="admin_val">Admin value</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m6 offset-m4">
          <button class="btn waves-effect waves-light save-button" type="submit" name="users_submit" style="margin-top:30px;background:#149BBB">Insert</button>
          </div>
        </div>
        <div class="row"></div>
      </form>
  </div>

  <div class="container" id="messages">
    <?php
    try{
      $s = "SELECT error_text FROM error";
      $result = mysqli_query($db, $s);
      $row = mysqli_fetch_row($result);
      $m = "SELECT message_text FROM messages";
      $mresult = mysqli_query($db, $m);
      $mrow = mysqli_fetch_row($mresult);
    }
    catch(Throwable $e) {
      echo "<p>Table does not exist</p>";
    }

    if (isset($row[0])) {
      echo '<p style="color:red; font-size:1rem">'.$row[0].'</p>';
      $db->query("DELETE FROM error");
    } else if (isset($mrow[0])) {
      echo '<p>' . $mrow[0] .'</p>';
      $db->query("DELETE FROM messages");
    }
    mysqli_close($db);
    ?>
  </div>
</div>


</body>
<?php include "admin_footer.php"?>
</html>


<script>
$('#branch_form').hide();
$('#car_form').hide();
$('#orders_form').hide();
$('#product_form').hide();
$('#review_form').hide();
$('#shopping_form').hide();
$('#trip_form').hide();
$('#users_form').hide();
$(document).ready(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown({
      coverTrigger: false
    });
    $('select').formSelect();
    $("#selection").on("change", function () {
        $('#branch_form').hide();
        $('#car_form').hide();
        $('#orders_form').hide();
        $('#product_form').hide();
        $('#review_form').hide();
        $('#shopping_form').hide();
        $('#trip_form').hide();
        $('#users_form').hide();
        $('#messages').hide();
        $("#" + $(this).val() + "_form").show()
    })

  });
  
 
</script>