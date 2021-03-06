<!DOCTYPE html>
<html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Rubic Cube Store</title>
     <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     
     <link type="text/css" rel="stylesheet" href="css/carousel.css">
     <link rel="stylesheet" href="css/style.css">
     <script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>	
     
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/main.js"> </script>
        <script type="text/javascript" src="js/jquery.js"></script>
	   <script type="text/javascript" src="js/carousel.js"></script>
	   
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
        <li ><a href="index.php">Forum</a></li>
        <li class="active"> <a href="shop.php">Shop </a></li>
        <li><a href="tutorial.php">Tutorial</a></li>
        <li><a href="about.html">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
           
          <?php
          session_start();
          $uname = $_SESSION['uname'];
          if(!$_SESSION['login']){
              ?>
          <li><a href="#" onclick="document.getElementById('idsignup').style.display='block'"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
              <li><a href="#" onclick="document.getElementById('idlogin').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <?php
          }else{
          ?>
          <form action = "php/logout.php">
              <span class="glyphicon glyphicon-user" id="usernamestyle" style="color:white;"><?php echo $uname;?></span>
              <li><button class="glyphicon glyphicon-log-out" id="logoutstyle" type = "submit">Log out</button></li>
          </form>
          <?php
          }
          ?>
          
      </ul>
    </div>
  </div>
</nav>
             
             <!--                     Login                      -->
             
     
             
        <div id="idlogin" class="modal">
  
  <form class="modal-content animate" action="php/getlogin.php" method="post">
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
  <form class="modal-content animate" action="php/getsignon.php" method="post">
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

 <!---------------------------            Slide picture   -------------------------->
 <div class="shopcontainer">

             <div class="slidepicture">
                 <div class="J_Poster image-main" data-setting='{
												"posterWidth":640,
												"posterHeight":270,
												"scale":0.85,
												"autoPlay":true,
												"delay":5000,
												"speed":500, 
												"vericalAlign":"top"
												}'>
<!--                     "width":800,"height":270,-->
	<div class="poster-btn poster-prev-btn"></div> <!--Left button-->
		<ul class="poster-list">
			<li class="poster-item"><a href="#"><img src="images/1.jpg" width="100%" height="100%"></a></li>
			<li class="poster-item"><a href="#"><img src="images/2.jpg" width="100%" height="100%"></a></li>
			<li class="poster-item"><a href="#"><img src="images/3.jpg" width="100%" height="100%"></a></li>
			<li class="poster-item"><a href="#"><img src="images/4.jpg" width="100%" height="100%"></a></li>
			<li class="poster-item"><a href="#"><img src="images/5.jpg" width="100%" height="100%"></a></li>
		</ul>
	<div class="poster-btn poster-next-btn"></div> <!--Right button-->
</div>
             
             </div>
             
<!---------------------------             store items display   -------------------------->
             <div class="shopinfoarea">
                 <table class="shopshow">
                     <tr>
                         <td>
                        <table class="shopinfo">
                 
                            <td><a href="shopdetail.php"><img id="imglist" src="images/2x2-3.jpg" alt="rubic cube"><br><p> RubicCube $20.00<p></a>
                            <button class="addtocart" type="button"><span>Add to Cart</span></button></td>
                        </table>
                         </td>
                         
                        <td>
                        <table class="shopinfo">
                 
                            <td><img id="imglist" src="images/3x3-2.jpg" alt="rubic cube"><br><p> RubicCube $20.00<p>
                            <button class="addtocart" type="button"><span>Add to Cart</span></button></td>
                        </table>
                         </td>
                     
                        <td>
                        <table class="shopinfo">
                            <td><img id="imglist" src="images/4x4-2.jpg" alt="rubic cube"><br><p> RubicCube $20.00<p>
                            <button class="addtocart" type="button"><span>Add to Cart</span></button></td>
                        </table>
                         </td>
                     </tr>
                     <tr>
                     <td>
             
                        <table class="shopinfo">
                            <td><img id="imglist" src="images/5x5-1.jpg" alt="rubic cube"><br><p> RubicCube $20.00<p>
                            <button class="addtocart" type="button"><span>Add to Cart</span></button></td>
                        </table>
                     </td>
                     
                     <td>
             
                        <table class="shopinfo">
                            <td><img id="imglist" src="images/2x2-3.jpg" alt="rubic cube"><br><p> RubicCube $20.00<p>
                            <button class="addtocart" type="button"><span>Add to Cart</span></button></td>
                        </table>
                     </td>
                     
                     <td>
             
                        <table class="shopinfo">
                            <td><img id="imglist" src="images/3x3-2.jpg" alt="rubic cube"><br><p> RubicCube $20.00<p>
                            <button class="addtocart" type="button"><span>Add to Cart</span></button></td>
                        </table>
                     </td>
                     </tr>
                     <tr>
                     <td>
             
                        <table class="shopinfo">
                            <td><img id="imglist" src="images/3x3-2.jpg" alt="rubic cube"><br><p> RubicCube $20.00<p>
                            <button class="addtocart" type="button"><span>Add to Cart</span></button></td>
                        </table>
                     </td>
                         
                         <td>
             
                        <table class="shopinfo">
                            <td><img id="imglist" src="images/4x4-2.jpg" alt="rubic cube"><br><p> RubicCube $20.00<p>
                            <button class="addtocart" type="button"><span>Add to Cart</span></button></td>
                        </table>
                     </td>
                         
                         <td>
             
                        <table class="shopinfo">
                            <td><img id="imglist" src="images/5x5-1.jpg" alt="rubic cube"><br><p> RubicCube $20.00<p>
                            <button class="addtocart" type="button"><span>Add to Cart</span></button></td>
                        </table>
                     </td>
                     
                     </tr>
                     
                     <tr>
                     <td>
             
                        <table class="shopinfo">
                            <td><img id="imglist" src="images/2x2-3.jpg" alt="rubic cube"><br><p> RubicCube $20.00<p>
                            <button class="addtocart" type="button"><span>Add to Cart</span></button></td>
                        </table>
                     </td>
                         
                         <td>
             
                        <table class="shopinfo">
                            <td><img id="imglist" src="images/3x3-2.jpg" alt="rubic cube"><br><p> RubicCube $20.00<p>
                            <button class="addtocart" type="button"><span>Add to Cart</span></button></td>
                        </table>
                     </td>
                         
                         <td>
             
                        <table class="shopinfo">
                            <td><img id="imglist" src="images/5x5-1.jpg" alt="rubic cube"><br><p> RubicCube $20.00<p>
                            <button class="addtocart" type="button"><span>Add to Cart</span></button></td>
                        </table>
                     </td>
                     
                     </tr>
                 </table>
             </div>
             
             
             
 </div>            
             
 <!--           close Login, signup by clicking anywhere                  -->       
             
<script>
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
</script>

  <!---------------------------             footer  -------------------------->           
             <footer>
                <p>Posted by: TEAM CUBE</p>
                 <p><b class="material-icons" style="font-size: 14px">copyright</b>2017 CUBE</p>
                <p>Contact information: <a href="">bdsb2011@gmail.com</a></p>
             </footer> 
             
             
             
             
         </body>
</html>