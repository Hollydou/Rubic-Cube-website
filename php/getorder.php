<!DOCTYPE html>
<html>
<body>

<h1>Get login</h1>

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
echo "Connected successfully<br>";

// retrive max postID and plus 1 assign to new row
$retrivequery = "SELECT max(OID) AS OID FROM orders";
$retriveresult=$conn->query($retrivequery);
if($retriveresult->num_rows > 0){
while($row=$retriveresult->fetch_assoc()){
$RID=$row["OID"]+1;
}	
}else{
die(mysqli_error());
}

$UID=$_POST["UID"];
$PID=$_POST["PID"];
$quantity=$_POST["quantity"];
$time=date("Y-m-d H:i:s");

$query="INSERT INTO orders(OID,UID,PID,quantity,time) VALUES ('$OID','$UID','$PID','$quantity','$time')";
if($conn->qurey($query)===TRUE){
echo "new record inserted";
}else{
echo "Error" . $sql . "<br>" . $conn->error;
}







?>

</body>
</html>