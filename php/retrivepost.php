<!DOCTYPE html>
<html>
<body>

<?php

// Connect to database
$servername = "localhost";
$dbusername = "root";
$dbpassword = "hefipikipuju";
$dbname = 'CubeShop';

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$return_arr = array();
$sql = "SELECT * FROM forumpost"; 

$result=$conn->query($sql);
if($result->num_rows > 0){
$return_arr=$result->fetch_all(MYSQLI_ASSOC);
}else{
	die(mysqli_error());
}
	echo json_encode($return_arr);

?>

</body>
</html>