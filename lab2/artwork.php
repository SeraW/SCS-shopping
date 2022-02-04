<!DOCTYPE html>
<html>
<head>
    <title>Art Work Database</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="artwork.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
<h1 class="center-align">Art Work Database</h1>

    <div class="container">
        <p class="center-align">Works of art spanning from abstract, baroque, gothic, and more. Art works range from 800 BC to 2024.</p>
        

        <!--Form--> 
        <form action="" method="POST">
            <div class="row padding">
                <div class="input-field col s4">
                    <label for="genre" class="active">Genre</label>
                    <select name="genre">
                        <option value="Abstract">Abstract</option>
                        <option value="Baroque">Baroque</option>
                        <option value="Gothic">Gothic</option>
                        <option value="Renaissance">Renaissance</option>
                    </select>
                </div>
                <div class="input-field col s4">
                    <label for="type" class="active">Type</label>
                    <select name="type">
                        <option value="Sculpture">Sculpture</option>
                        <optgroup label="Painting">
                            <option value="Landscape">Landscape</option>
                            <option value="Portrait">Portrait</option>
                    </select>
                </div>
                <div class="input-field col s4">
                    <label for="specification" class="active">Specification</label>
                    <select name="specification">
                        <option value="Commercial">Commercial</option>
                        <option value="Non-commercial">Non-commercial</option>
                        <option value="Derivative Work">Derivative Work</option>
                        <option value="Non-Derivative Work">Non-Derivative Work</option>
                    </select>
                </div>   
            </div>
            
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="year" name="year" class="validate">
                    <label for="year">Year</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="museum" name="museum" class="validate">
                    <label for="museum">Museum</label>
                </div>
            </div>

            <!--Save button--> 
            <button class="btn waves-effect waves-light save-button" type="submit" name="save">Save Record
                <i class="material-icons right">send</i>
            </button>
            <!--Clear button--> 
            <button class="btn waves-effect waves-light clear-button" type="submit" name="clear">Clear Record
                <i class="material-icons right">clear</i>
            </button>   
        </form>

    
    </div>
    <div id="boxes">
        <div class = "box" id="box-c">
            <h2>Submitted Record </h2>
            <?php 
                session_start();
                if(!isset($_SESSION['counter'])) {
                    $_SESSION['counter'] = 0;
                    $_SESSION['Artwork'] = array();
                }
                    
                if (isset($_POST["clear"])){
                    $_SESSION['Artwork'] = array();
                    $_SESSION['counter'] = 0;
                } elseif (isset($_POST["save"])){
                    $_SESSION['Artwork'][$_SESSION['counter']]= array("Genre" => $_POST["genre"], "Type" => $_POST["type"],"Specification" => $_POST["specification"],"Year" => $_POST["year"],"Museum" => $_POST["museum"]);
                    echoSubmission();
                    
                } elseif($_SESSION['counter'] > 0){
                    --$_SESSION['counter'];
                    echoSubmission();
                    
                }
                
            ?>
        </div>
        <div class = "box" id="box-e">
            <h2>Index representation </h2>
            <?php
                if (isset($_POST['find'])){
                    echoFind();
                    
                }
            ?>
        </div>
    </div>
    <form action="" method="POST" id="index-form">
        <label for="index" class="active">Index</label>
        <select name="index">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        echoDropdown();  
                }
            ?>
        </select>
        <button class="btn waves-effect waves-light " type="submit" name="find">find index
            <i class="material-icons right">send</i>
        </button>
    </form>
</body>
</html>
<?php 
    function echoSubmission(){
        echo "<p><span>Genre:</span> ". $_SESSION['Artwork'][$_SESSION['counter']]["Genre"] ."</p>";
        echo "<p><span>Type:</span> ". $_SESSION['Artwork'][$_SESSION['counter']]["Type"] ."</p>";
        echo "<p><span>Specification:</span> ". $_SESSION['Artwork'][$_SESSION['counter']]["Specification"] ."</p>";
        echo "<p><span>Year:</span> ". $_SESSION['Artwork'][$_SESSION['counter']]["Year"] ."</p>";
        echo "<p><span>Museum:</span> ". $_SESSION['Artwork'][$_SESSION['counter']]["Museum"] ."</p>";
        ++$_SESSION['counter'];
    }
    function echoDropdown(){
        for ($i = 0; $i < $_SESSION['counter']; $i++){
            echo "<option value='".$i."'>".$i."</option>";
        }
    }
    function echoFind(){
        echo "<p><span>Genre:</span> ". $_SESSION['Artwork'][$_POST["index"]]["Genre"] ."</p>";
        echo "<p><span>Type:</span> ". $_SESSION['Artwork'][$_POST["index"]]["Type"] ."</p>";
        echo "<p><span>Specification:</span> ". $_SESSION['Artwork'][$_POST["index"]]["Specification"] ."</p>";
        echo "<p><span>Year:</span> ". $_SESSION['Artwork'][$_POST["index"]]["Year"] ."</p>";
        echo "<p><span>Museum:</span> ". $_SESSION['Artwork'][$_POST["index"]]["Museum"] ."</p>";
    }
?>
<script>
     $(document).ready(function(){
        $('select').formSelect();
       
  });
        
</script>

