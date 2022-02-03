<!DOCTYPE html>
<html>
<head>
    <title>Electronics-Center</title>
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
             <!--Get index? -->
             <div class="input-field index">
                <input type="text" id="index" name="index">
                <label for="index">Index</label>
            </div>      
        </form>

    
    </div>
    <div id="box-c">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            

            if (isset($_POST['clear'])){
                echo "delete records";
            } else {
                echo "<p><span>Genre:</span> ".$_POST['genre']."</p>";
                echo "<p><span>Type:</span> ".$_POST['type']."</p>";
                echo "<p><span>Specification:</span> ".$_POST['specification']."</p>";
                echo "<p><span>year:</span> ".$_POST['year']."</p>";
                echo "<p><span>museum:</span> ".$_POST['museum']."</p>";
            }
            }
        ?>
    </div>
</body>
</html>

<script>
     $(document).ready(function(){
        $('select').formSelect();
       
  });
        
</script>

