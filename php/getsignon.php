<!DOCTYPE html>
<html>
<body>

<h1>Get Sign on</h1>

<?php

// Connect to database
$servername = "localhost";
$username = "root";
$dbpassword = "hefipikipuju";
$dbname = 'CubeShop';

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br>";

// make prepared statement
$insertquery = "INSERT INTO userlogin(UID, password, uname, phone, email) VALUES(?,?,?,?,?)";
if($stmt = $conn->prepare($insertquery)){
	$stmt -> bind_param('sssss',$UID,$password,$username,$phone,$email);
}else{
	die($mysqli->error);
}

// retrive max UID and plus 1 assign to new row
$retrivequery = "SELECT max(UID) AS UID FROM userlogin";
$retriveresult=$conn->query($retrivequery);
if($retriveresult->num_rows > 0){
	while($row=$retriveresult->fetch_assoc()){
	$UID=$row["UID"]+1;
	}	
}else{
	die(mysqli_error());
}

// $username="username";
// $password="password";
// // $UID=$row['UID']+1;
// $phone="phone";
// $email="email";

$username=$_POST["username"];
$password=$_POST["password"];
// $UID=$retriveresult+1;
$phone=$_POST["phone"];
$email=$_POST["email"];
$stmt->execute();


// after sign on
echo "new record inserted";



?>

</body>
</html>