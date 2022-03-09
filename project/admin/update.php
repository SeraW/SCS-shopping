<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>SCS | Update </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/update.css" type="text/css">
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
    <div class="row">
        <h1>Database <span class="highlight">Administration</span></h1>
        <h2>Update data below</h2>
    </div>
    <form action="" method="POST">
        <div class="row query">
            <div class="col input-field s12 m11">
                <input id="query" name="query" type="text" class="validate" required>
                <label for="query">Enter update query</label>
            </div>
            <div class="col s6 offset-s4 m1">
            <button class="btn waves-effect waves-light save-button" type="submit" name="query_submit" style="margin-top: 25px; background:#149BBB">Enter</button>
            </div>
        </div>
    </form>
 </div>
 
 <?php

if (isset($_POST['query_submit'])){
    if (isset($_POST['query'])){
        try{
            $query= $_POST['query'];
            $db = mysqli_connect("localhost", "root", "", "project");
            if ($db->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            mysqli_query($db, $query);
            echo "<p>Update successful</p>";

        }catch(throwable $e){
            echo "<p style=color:red>Update failed</p>";
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