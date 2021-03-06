<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubic Cube Forum</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/main.js">


    </script>
</head>

<body>
    <header></header>
    <!----------------------------          navigation            --------------------------->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
                <a class="navbar-brand" href="index.php">Rubick Cube</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Forum</a></li>
                    <li class="dropdown"> <a href="shop.html">Shop </a></li>
                    <li><a href="tutorial.html">Tutorial</a></li>
                    <li><a href="about.html">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li><a href="#" onclick="document.getElementById('idsignup').style.display='block'"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>

                    <li><a href="#" onclick="document.getElementById('idlogin').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--                     Login                      -->



    <div id="idlogin" class="modal">

        <form class="modal-content animate" action="/action_page.php">
            <div class="imgcontainer">
                <span onclick="document.getElementById('idlogin').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="images/headicon.jpg" alt="Mario" class="Mario">
            </div>

            <div class="container">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button class="submitlogin" type="submit">Login</button>
                <input type="checkbox" checked="checked"> Remember me
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('idlogin').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>

    <!--                     sign up                      -->

    <div id="idsignup" class="modal">
        <span onclick="document.getElementById('idsignup').style.display='none'" class="closesignup" title="Close Modal">&times;</span>
        <form class="modal-content animate" action="/action_page.php">
            <div class="container">
                <label><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <label><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                <input type="checkbox" checked="checked"> Remember me
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('idsignup').style.display='none'" class="cancelsignupbtn">Cancel</button>
                    <button type="submit" class="signupbtn">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
    <!----------------------------          breadcrumb         --------------------------->
    <ul class="breadcrumb">
        <li><a href="index.php">Froum</a></li>
        <li>Froum Topic</li>
    </ul>

    <!----------------------------          forum specific topic post            --------------------------->
    <!----------------------------          post 1         --------------------------->
    <div class="submitpostarea">
        <form action="php/getpost.php" method="post">
            <label for="fname">Name:</label>
            <input type="text" id="inputComment" name="firstname" placeholder="Your name..."><br>
            <label class="poststyle" for="fname">Post:</label>
            <textarea name="text" id="inputComment2" rows="5" cols="135" wrap="soft" maxlength="1366" placeholder="Write down your post here..."> </textarea>
           
 <input type="hidden" name="UID" value="           
<?php
session_start();
if($_SESSION['login']){
            $uname = $_SESSION['uname'];
}else{
            $uname = 'Visitor';
}
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
// make prepared statement
$query = "SELECT UID FROM userlogin WHERE Uname=?";
if($stmt = $conn->prepare($query)){
	$stmt -> bind_param('s',$unamw);
}else{
	die($mysqli->error);
}
$stmt->execute();
$result = $stmt->get_result();
while($row = mysqli_fetch_assoc($result)){
$UID=row['UID'];
}
echo $UID
?>">
            <input class="submitbutton" type="submit" value="Post">
        </form>
    </div>

    <!--                                                                                             -->

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
$sql = "SELECT * FROM forumpost"; 
$result = mysqli_query($conn, $sql);
while($each_res = mysqli_fetch_assoc($result)){
    ?>
    <table class="postarea">
        <tr>
            <td>
                <a class="posta" href="post.html"><img id="headicon" src="images/headicon.jpg" alt="topicicon"></a>
            </td>
            <td>
                <a class="posta" href="post.html">
                    <p id="postdescribe">
                        <?php echo $each_res[title];?>
                    </p>
                </a><br>
                <p id="postinfo">ID:
                    <?php echo $each_res[postID];?>&nbsp;&nbsp;view:60 &nbsp;&nbsp;Date:
                    <?php echo $each_res[posttime];?>
                    <p>
            </td>
        </tr>
    </table>
    <?php
}
?>








    <table class="postarea">
        <tr>
            <td>
                <a class="posta" href="post.html"><img id="headicon" src="images/headicon.jpg" alt="topicicon"></a>
            </td>
            <td>
                <a class="posta" href="post.html">
                    <p id="postdescribe">How to start the rubic cube? Description Description Description Description Description</p>
                </a><br>
                <p id="postinfo">ID:43219387&nbsp;&nbsp;view:60 &nbsp;&nbsp;Data:2017/04/29
                    <p>
            </td>
        </tr>
    </table>










    <!----------------------------          post 2         --------------------------->
    <!--
    <table class="postarea">
        <tr>
            <td>
                <a class="posta" href=""><img id="headicon" src="images/headicon2.jpg" alt="topicicon"></a>
            </td>
            <td>
                <a class="posta" href="">
                    <p id="postdescribe">How to start the rubic cube? Description Description Description Description Description</p>
                </a><br>
                <p id="postinfo">ID:43219387&nbsp;&nbsp;view:60 &nbsp;&nbsp;Data:2017/04/29
                    <p>
            </td>
        </tr>
    </table>
-->
    <!----------------------------          post 3         --------------------------->

    <!--
    <table class="postarea">
        <tr>
            <td>
                <a class="posta" href=""><img id="headicon" src="images/headicon.jpg" alt="topicicon"></a>
            </td>
            <td>
                <a class="posta" href="">
                    <p id="postdescribe">How to start the rubic cube? Description Description Description Description Description</p>
                </a><br>
                <p id="postinfo">ID:43219387&nbsp;&nbsp;view:60 &nbsp;&nbsp;Data:2017/04/29
                    <p>
            </td>
        </tr>
    </table>
-->
    <!----------------------------          post 4         --------------------------->

    <!--
    <table class="postarea">
        <tr>
            <td>
                <a class="posta" href=""><img id="headicon" src="images/headicon2.jpg" alt="topicicon"></a>
            </td>
            <td>
                <a class="posta" href="">
                    <p id="postdescribe">How to start the rubic cube? Description Description Description Description Description</p>
                </a><br>
                <p id="postinfo">ID:43219387&nbsp;&nbsp;view:60 &nbsp;&nbsp;Data:2017/04/29
                    <p>
            </td>
        </tr>
    </table>
-->
    <!----------------------------          post 5         --------------------------->

    <!--
    <table class="postarea">
        <tr>
            <td>
                <a class="posta" href=""><img id="headicon" src="images/headicon.jpg" alt="topicicon"></a>
            </td>
            <td>
                <a class="posta" href="">
                    <p id="postdescribe">How to start the rubic cube? Description Description Description Description Description</p>
                </a><br>
                <p id="postinfo">ID:43219387&nbsp;&nbsp;view:60 &nbsp;&nbsp;Data:2017/04/29
                    <p>
            </td>
        </tr>
    </table>
-->
    <!----------------------------          post 6         --------------------------->
    <!--
    <table class="postarea">
        <tr>
            <td>
                <a class="posta" href=""><img id="headicon" src="images/headicon2.jpg" alt="topicicon"></a>
            </td>
            <td>
                <a class="posta" href="">
                    <p id="postdescribe">How to start the rubic cube? Description Description Description Description Description</p>
                </a><br>
                <p id="postinfo">ID:43219387&nbsp;&nbsp;view:60 &nbsp;&nbsp;Data:2017/04/29
                    <p>
            </td>
        </tr>
    </table>
-->
    <!----------------------------          post 7        --------------------------->
    <!--
    <table class="postarea">
        <tr>
            <td>
                <a class="posta" href=""><img id="headicon" src="images/headicon.jpg" alt="topicicon"></a>
            </td>
            <td>
                <a class="posta" href="">
                    <p id="postdescribe">How to start the rubic cube? Description Description Description Description Description</p>
                </a><br>
                <p id="postinfo">ID:43219387&nbsp;&nbsp;view:60 &nbsp;&nbsp;Data:2017/04/29
                    <p>
            </td>
        </tr>
    </table>
-->
    <!----------------------------          post 8         --------------------------->
    <!--
    <table class="postarea">
        <tr>
            <td>
                <a class="posta" href=""><img id="headicon" src="images/headicon2.jpg" alt="topicicon"></a>
            </td>
            <td>
                <a class="posta" href="">
                    <p id="postdescribe">How to start the rubic cube? Description Description Description Description Description</p>
                </a><br>
                <p id="postinfo">ID:43219387&nbsp;&nbsp;view:60 &nbsp;&nbsp;Data:2017/04/29
                    <p>
            </td>
        </tr>
    </table>
-->



    <!--           close Login, signup by clicking anywhere                  -->
    <script type='text/javascript'>
        // Get the modal
        var modallogin = document.getElementById('idlogin');
        var modalsignup = document.getElementById('idsignup');
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modallogin) {
                modallogin.style.display = "none";

            }
            if (event.target == modalsignup) {
                modalsignup.style.display = "none";

            }
        }



        //        $(document).ready(function() {
        ////                                console.log("111");
        //
        //            /* call the php that has the php array which is json_encoded */
        //            $.getJSON('php/retrivepost.php', function(data) {
        //                                                console.log("111");
        //
        //                /* data will hold the php array as a javascript object */
        //                $.each(data, function(key, val) {
        ////                    console.log("111");
        ////                    console.log(val);
        //                    $('.postBlock').append('<table class = "postarea"><tr><td><a class = "posta" href = "post.html"><img id = "headicon" src = "images/headicon.jpg" alt = "topicicon"></a></td><td><a class = "posta" href = "post.html"><p id = "postdescribe">' + val.title + '</p></a><br><p id = "postinfo" > ID : ' + val.postID + '& nbsp; & nbsp; view: 60 & nbsp; & nbsp; Data: ' + val.posttime + '<p></td></tr></table>');
        //                });
        //            });
        //
        //        });

    </script>


    <!---------------------------             footer  -------------------------->

    <footer>
        <p>Posted by: TEAM CUBE</p>
        <p><b class="material-icons" style="font-size: 14px">copyright</b>2017 CUBE</p>
        <p>Contact information: <a href="">bdsb2011@gmail.com</a></p>
    </footer>
</body>

</html>
