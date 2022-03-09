<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>SCS | Select </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/select.css" type="text/css">
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
        <h2>Select data below</h2>
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
        <div class="col s1 m3">
          <button class="btn waves-effect waves-light save-button" type="submit" name="tables_submit" style="background:#149BBB">Select</button>
        </div>
      </form>
    </div>  
  </div>

<?php
    if (isset($_POST['tables_submit'])){
        if(isset($_POST['tables'])){
            try{
                $selected_table = $_POST['tables'];
                $get_col = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='project' AND `TABLE_NAME`='$selected_table'";
                      echo "<div>
                        <table class='responsive-table striped centered'>
                            <thead>
                              <tr>";
                                foreach ($db->query($get_col) as $row){
                                    echo "<th>" . $row['COLUMN_NAME'] . "</th>";
                                }
                              echo "</tr>
                            </thead>";
                            $sql = "SELECT * FROM $selected_table";
                            echo "<tbody>";
                            foreach ($db->query($sql) as $row){
                              echo "<tr>";
                              foreach ($db->query($get_col) as $crow){
                                echo "<td>" . $row[$crow['COLUMN_NAME']] . "</td>";
                              }
                              echo "</tr>";
                            }
                            echo "</tbody>
                        </table></div>";
            } catch(Throwable $e){
                echo "<p id='error'>Table could not be displayed</p>";
            }
       }
    }
  mysqli_close($db);
?>
</div>

</body>
<?php include "admin_footer.php"?>
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