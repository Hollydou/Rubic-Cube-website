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

$username=$_POST["uname"];
$password=$_POST["psw"];
echo $username;
echo $password;
// retrive password
$retrivequery = "SELECT password FROM userlogin WHERE Uname='$username'";
$retriveresult=$conn->query($retrivequery);
if($retriveresult->num_rows <= 0){
    echo "<script>alert('Wrong Password! Try again');window.history.back(-1);</script>";
}
if($retriveresult->num_rows > 0){
	$row=$retriveresult->fetch_assoc();
	$pass=$row["password"];
}else{
	die(mysqli_error());
}
if($password == $pass){
	session_start();
    $_SESSION['login'] = true;
    $_SESSION['uname'] = $username;
    header("Location: https://infs3202-w8xx0.uqcloud.net/index.php");
}else{
	echo "<script>alert('Wrong Password! Try again');histroy.go(-1);window.history.back(-1);</script>";
}
?>