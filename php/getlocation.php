<?php
$dbServer = 'localhost';
$dbUser = 'root';
$dbPass = 'hefipikipuju';
$dbname = 'CubeShop';
$conn = new mysqli($dbServer, $dbUser, $dbPass, $dbname);
$mydb = mysqli_select_db($conn, 'CubeShop');
	
//Database Connection test
/*if($conn){ echo "connection is established!"; }else{ echo "error in connection"; }
		echo "<br/>";
if($mydb){ echo "database is found!"; }else{ echo "error in connecting to database"; }
*/		

$COOR = $_POST['aha'];

$query="INSERT INTO User_position VALUES ('$COOR')";

if(mysqli_query($conn, $query)){
	echo "new record inserted";
}else{
	echo "Error" . $sql. "<br>" . $conn->error;
}

header('Location: ../index.php');
?>