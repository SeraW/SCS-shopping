<?php
$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$branch_addy = $_POST["branch_addy"];
$lat = $_POST["lat"];
$lon = $_POST["lon"];

try {
    $check = $db->query("SELECT * FROM branch WHERE branch_addy = '$branch_addy'");
    $num = mysqli_num_rows($check);

    if ($num == 1){
        $error = "Address already exists.";
        $s = "INSERT into error(error_text) values ('$error')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    } else {
        $insert = "INSERT into branch(branch_addy, lat, lon) values ('$branch_addy', $lat, $lon)";
        mysqli_query($db, $insert);
        $message = "Data added successfully";
        $s = "INSERT into messages(message_text) values ('$message')";
        mysqli_query($db,$s);
        header("Location: ../insert.php");
    }

} catch(Throwable $e){
    echo "<p>Insert failed</p>";
}

?>