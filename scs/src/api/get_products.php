<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");


$db = mysqli_connect("localhost", "root", "", "project");
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = mysqli_query($db, "SELECT prod_name FROM product");
while($r = mysqli_fetch_assoc($sql)) {
    $rows[] = $r;
}

print json_encode($rows); 
mysqli_close($db);

?>