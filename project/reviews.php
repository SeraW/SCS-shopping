<!DOCTYPE html>
<html>
<head>
    <title>SCS | Reviews </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/reviews.css" type="text/css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<?php include "navbar.php";
$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}?>

<body>
<div id="review-container">
    <div class="container">
        <div class="row" id="title">
            <h1>What people are <span class="highlight">saying</span></h1>
            <h2>We've had the pleasure of delivering to over 500 customers worldwide. Here's what they've had to say.<h2>
        </div>
    </div>

        <div class="carousel">

            <div class="carousel-item">
                <div class="card horizontal sticky-action">
                    <div class="card-stacked">
                        <div class="card-content">
                        <span class="material-icons star">star_rate star_rate star_rate star_rate star_rate</span>
                        <?php
                            try{
                                $s = "SELECT review_text FROM review WHERE review_id = 1";
                                $result = mysqli_query($db, $s);
                                $row = mysqli_fetch_row($result);
                                echo "<p>" . $row[0] . "</p>";
                                echo '</div>
                                <div class="card-action">';
                                $name= "SELECT first_name, last_name FROM users u, review r WHERE review_id=1 AND u.user_id=r.user_id";
                                $result = mysqli_query($db, $name);
                                $row = mysqli_fetch_row($result);
                                echo '<a href="#" style="color:#149BBB">' . $row[0] . " " . $row[1] . '</a>
                                </div>';
                            } catch(throwable $e){
                                echo "<p>Error displaying review</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="card horizontal sticky-action">
                    <div class="card-stacked">
                        <div class="card-content">
                        <span class="material-icons star">star_rate star_rate star_rate star_rate star_rate</span>
                        <?php
                            try{
                                $s = "SELECT review_text FROM review WHERE review_id = 2";
                                $result = mysqli_query($db, $s);
                                $row = mysqli_fetch_row($result);
                                echo "<p>" . $row[0] . "</p>";
                                echo '</div>
                                <div class="card-action">';
                                $name= "SELECT first_name, last_name FROM users u, review r WHERE review_id=2 AND u.user_id=r.user_id";
                                $result = mysqli_query($db, $name);
                                $row = mysqli_fetch_row($result);
                                echo '<a href="#" style="color:#149BBB">' . $row[0] . " " . $row[1] . '</a>
                                </div>';
                            } catch(throwable $e){
                                echo "<p>Error displaying review</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="card horizontal sticky-action">
                    <div class="card-stacked">
                        <div class="card-content">
                        <span class="material-icons star">star_rate star_rate star_rate star_rate star_rate</span>
                        <?php
                            try{
                                $s = "SELECT review_text FROM review WHERE review_id = 3";
                                $result = mysqli_query($db, $s);
                                $row = mysqli_fetch_row($result);
                                echo "<p>" . $row[0] . "</p>";
                                echo '</div>
                                <div class="card-action">';
                                $name= "SELECT first_name, last_name FROM users u, review r WHERE review_id=3 AND u.user_id=r.user_id";
                                $result = mysqli_query($db, $name);
                                $row = mysqli_fetch_row($result);
                                echo '<a href="#" style="color:#149BBB">' . $row[0] . " " . $row[1] . '</a>
                                </div>';
                            } catch(throwable $e){
                                echo "<p>Error displaying review</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="card horizontal sticky-action">
                    <div class="card-stacked">
                        <div class="card-content">
                        <span class="material-icons star">star_rate star_rate star_rate star_rate star_rate</span>
                        <?php
                            try{
                                $s = "SELECT review_text FROM review WHERE review_id = 4";
                                $result = mysqli_query($db, $s);
                                $row = mysqli_fetch_row($result);
                                echo "<p>" . $row[0] . "</p>";
                                echo '</div>
                                <div class="card-action">';
                                $name= "SELECT first_name, last_name FROM users u, review r WHERE review_id=4 AND u.user_id=r.user_id";
                                $result = mysqli_query($db, $name);
                                $row = mysqli_fetch_row($result);
                                echo '<a href="#" style="color:#149BBB">' . $row[0] . " " . $row[1] . '</a>
                                </div>';
                            } catch(throwable $e){
                                echo "<p>Error displaying review</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        if (isset($_SESSION["username"]) && (!isset($_POST['review_submit']))){
            echo '<div class="container"  id="feedback_title">
                    <div class="row">
                        <h1><br>Tell us what you <span class="highlight">think</span></h1><br>
                    </div>
                        <form name="review" id="review" action="" method="POST">
                            <div class="row">
                                <div class="input-field col s10 offset-s1">
                                    <textarea id="reviewarea" name="reviewarea" class="materialize-textarea" type="text" data-length="500"></textarea>
                                    <label for="reviewarea">Type your review here</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="center-align">
                                <button class="btn waves-effect waves-light save-button" type="submit" name="review_submit" style="background:#149BBB">Submit</button>
                                </div><br>
                            </div>
                        </form>
                </div>';

        }
        

        if (isset($_POST['review_submit'])){
            try {
                $review_text = $_POST["reviewarea"];
                $username = $_SESSION['username'];
                $query = "SELECT user_id FROM users WHERE '$username' = login_id";
                $qresult = mysqli_query($db, $query);
                $qrow = mysqli_fetch_row($qresult);
                $user_id = $qrow[0];
                $review_insert = "INSERT into review(review_text, user_id) values ('$review_text', $user_id)";
                mysqli_query($db, $review_insert);

                echo '<div class="container" id="thanks">
                    <h1><br>Thank <span class="highlight">you!</span></h1>
                    <h2>We appreciate your feedback.<h2>
                </div>';

            } catch(throwable $e){
                echo "error";
            }
        }



        ?>

        
        </div>
    </div>
</div>
</body>

</html>

<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
        $(".dropdown-trigger").dropdown({
            coverTrigger: false
        });
        $('textarea#reviewarea').characterCounter();
        $('.carousel').carousel({
            dist:0,
            shift:0,
            padding:20,

      });
        
    });
</script>
<?php include "greyfooter.php"?>