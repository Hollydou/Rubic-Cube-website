<!DOCTYPE html>
<html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Rubic Cube Forum</title>
     <script src="https://d3js.org/d3.v3.min.js"></script>
	 <script src="js/d3.layout.cloud.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Impact" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/style.css">
     <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <script src="js/main.js"> </script>
     <script src="js/map.js"> </script>
	 <script src="js/Geolocation.js"> </script>
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
        <li class="dropdown"> <a href="shop.php">Shop </a></li>
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
<!----------------------------         word-cloud           ---------------------------> 
	<div class="wordcloudarea">
		<div id="word-cloud"> </div>
	</div>
<!----------------------------         map+Geolocation           ---------------------------> 
    <div class="maparea">
    <p id="CurrentLocation"></p>         
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
		
		$sql = "SELECT coordinate FROM User_position";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
		echo "<script>function getPoints() {return [";
		while($row = $result->fetch_assoc()) {
			echo "new google.maps.LatLng(". $row['coordinate']. "),";
			}
			echo "];}</script>";
		} else {
			echo "No results founds(database is empty)";
			}
	$conn->close();
	?>
    
	<div id="heatmaparea"></div>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJzPG-L5GstSeXxXAOgeU-_bROjO9MQFc&libraries=visualization&callback=initMap"> </script> 
	
	
	<div class="mapdescription">
		<p>Heat Map of The Visitis</p>
		<form action="php/getlocation.php" method="post">
			<input type = "hidden" name="aha" id="input_field" value="-69.020639, 134.786494"/>
			<button type = "submit" class="mapbutton">Join me to the heat map</button>
		</form>
		</div>
    </div>
    
<!----------------------------          forum topic            ---------------------------> 
<!----------------------------          topic   1         --------------------------->
             <div id="topicarea">
             <a class="topica" href="forum_topic.php"><p class="topicp">How to start the Rubic Cube</p></a>
             <a class="topica" href="forum_topic.php"><img id="topicicon" src="images/headicon2.jpg" alt="topicicon"></a>
             <table class="topicarea">                
                 <tr>
                     <td><a class="topica" href="forum_topic.php"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></a></td>         
                 </tr>
                 <tr>
                     <td id="viewtimes"><p >view:60 &nbsp;&nbsp;Data:2017/04/29<p></td>
                 </tr>
                   
             </table>
 <!----------------------------          topic 2           --------------------------->            
             <a class="topica" href=""><p class="topicp">How to start the Rubic Cube</p></a>
             <a class="topica" href=""><img id="topicicon" src="images/headicon2.jpg" alt="topicicon"></a>
             <table class="topicarea">                
                 <tr>
                     <td><a class="topica" href=""><p>How to start the rubic cube? Description Description Description Description Description Description Description Description Description Description Description Description Description</p></a></td>         
                 </tr>
                 <tr>
                     <td id="viewtimes"><p >view:60 &nbsp;&nbsp;Data:2017/04/29<p></td>
                 </tr>
 <!----------------------------          topic 3           --------------------------->                   
             </table>
             
             <a class="topica" href=""><p class="topicp">How to start the Rubic Cube</p></a>
             <a class="topica" href=""><img id="topicicon" src="images/headicon2.jpg" alt="topicicon"></a>
             <table class="topicarea">                
                 <tr>
                     <td><a class="topica" href=""><p>How to start the rubic cube? Description Description Description Description Description Description Description Description Description Description Description Description Description</p></a></td>         
                 </tr>
                 <tr>
                     <td id="viewtimes"><p >view:60 &nbsp;&nbsp;Data:2017/04/29<p></td>
                 </tr>
  <!----------------------------          topic 4           --------------------------->                  
             </table>
             
             <a class="topica" href=""><p class="topicp">How to start the Rubic Cube</p></a>
             <a class="topica" href=""><img id="topicicon" src="images/headicon2.jpg" alt="topicicon"></a>
             <table class="topicarea">                
                 <tr>
                     <td><a class="topica" href=""><p>How to start the rubic cube? Description Description Description Description Description Description Description Description Description Description Description Description Description</p></a></td>         
                 </tr>
                 <tr>
                     <td id="viewtimes"><p >view:60 &nbsp;&nbsp;Data:2017/04/29<p></td>
                 </tr>
  <!----------------------------          topic 5          --------------------------->                  
             </table>
             
             <a class="topica" href=""><p class="topicp">How to start the Rubic Cube</p></a>
             <a class="topica" href=""><img id="topicicon" src="images/headicon2.jpg" alt="topicicon"></a>
             <table class="topicarea">                
                 <tr>
                     <td><a class="topica" href=""><p>How to start the rubic cube? Description Description Description Description Description Description Description Description Description Description Description Description Description</p></a></td>         
                 </tr>
                 <tr>
                     <td id="viewtimes"><p >view:60 &nbsp;&nbsp;Data:2017/04/29<p></td>
                 </tr>
                   
             </table>
             
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

//WordCloud
	var word_list = ["welcome","To","Interesting","Funny","Have Fun","Cheapest price","Hahahaha","Danson", "Qi", "Holly", "Our", "Rubic Cube", "Tutorial","Everything","Team Cube","Forum","Post","Left comments","Heatmap","Give","Position","3*3","Funny","welcome","To","Interesting","Funny","Have Fun","Cheapest price","Hahahaha","Danson", "Qi", "Holly", "Our", "Rubic Cube", "Tutorial","Everything","Team Cube","Forum","Post","Left comments","Heatmap","Give","Position","3*3","Funny"];
	var width = 1300, height = 400;
    var fill = d3.scale.category20();
	
	d3.layout.cloud().size([width, height])
            .words(word_list.map(function(d) {
				return {text: d, size: 10 + Math.random() * 90};
			}))
			.padding(5)
            .fontSize(function(d) { return d.size; })
			.font("Impact")
            .on("end", draw)
            .start();
    function draw(words) {
        d3.select("#word-cloud").append("svg")
                .attr("width", width)
                .attr("height", height)
                .attr("class", "wordcloud")
                .append("g")
                // without the transform, words words would get cutoff to the left and top, they would
                // appear outside of the SVG area
                .attr("transform", "translate(" + ( width / 2 ) + "," + ( height / 2 ) + ")")
                .selectAll("text")
                .data(words)
                .enter().append("text")
				.style("font-family", "Impact")
				.style("text-align", "center")
                .style("font-size", function(d) { return d.size + "px"; })
                .style("fill", function(d, i) { return fill(i); })
                .attr("text-anchor","middle")
				.attr("transform", function(d) {
                    return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
                })
                .text(function(d) { return d.text; });
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