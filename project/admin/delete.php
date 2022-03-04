<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>SCS | Delete </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/delete.css" type="text/css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<?php include "admin_header.php"?>
<body>
<div id="insert-div">
  <div class="container">
      <div class="row" id="deletetitle">
          <h1>Database <span class="highlight">Administration</span></h1>
          <h2>Delete data below</h2>
      </div>
      <div class="row table_select">
        <form action="" method="POST">
          <div class="col s8 m6 offset-m3">
              <select class="browser-default choice" id="selection" name="tables">
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
                      echo "<option value='$row[Tables_in_project]'> $text</option>"; 
                    }
                  ?>
              </select>
          </div>
          <div class="col s1  m3">
            <button class="btn waves-effect waves-light save-button" type="submit" name="tables_submit" style="background:#149BBB">Select</button>
          </div>
        </form>
      </div>  
  </div>

  <?php

      if (isset($_POST['tables_submit'])){
        if(isset($_POST['tables'])){
          $keyword="";
          $table = $_POST['tables'];

          if ($table == "orders"){
            $keyword="order_id";

          } else if ($table == "product"){
            $keyword ="prod_id";

          } else if ($table == "shopping"){
            $keyword = "receipt_id";

          } else if ($table == "users"){
            $keyword = "user_id";

          } else {
            $keyword = $table . "_id";
          }
          
          $sql = "SELECT $keyword FROM $table ";
          echo "<div class='container'>";
            echo "<div class='row'>";
              echo "<form action='' method='POST'>";
                  echo "<div class='col s8 m6 offset-m3'>";
                    echo "<select class='browser-default choice' id='id_select' name='id_select'>";
                      echo "<option value='' disabled selected>Select $table ID</option>";
                        foreach ($db->query($sql) as $row){
                          echo "<option value='$row[$keyword]'> $row[$keyword]</option>"; 
                        }
                    echo "</select>";
                  echo "</div>";
                  echo "<div class='col s1 m3'>";
                    echo "<button class='btn waves-effect waves-light save-button' type='submit' name='id_submit' style='background:#149BBB'>Delete</button>";
                  echo "</div>";
              echo "</form>";
            echo "</div></div></div>";
          echo "</div";
          
          $_SESSION['table'] = $table;
          $_SESSION['keyword'] = $keyword;

          }
      }
      if (isset($_POST['id_submit'])){
        if(isset($_POST['id_select']) && isset($_SESSION['table']) && isset($_SESSION['keyword'])){
          $chosen_table =$_SESSION['table'];
          $chosen_keyword = $_SESSION['keyword'];
          try{
            $goodbye = $_POST['id_select'];
            $delete = "DELETE FROM $chosen_table WHERE $chosen_keyword = $goodbye";
            mysqli_query($db, $delete);
            echo "<p>Deleted ID " . $goodbye . " from " . $chosen_table . " table</p>";
    
          } catch(throwable $e){
            echo "<p style='color:red'>Deletion failed</p>";

          }
        }
      }
  ?>
</div>
<?php include "admin_footer.php"?>
</body>

</html>

<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
        $(".dropdown-trigger").dropdown({
            coverTrigger: false
        });
        $('select').formSelect();
        
    });
</script>