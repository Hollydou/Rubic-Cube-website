//---------------Edit the Number of the items function -------------------------

//if (screen && screen.width > 480) {
//  document.write('<script type="text/javascript" src="js/main.js"><\/script>');
//}
//
//
//if( /Android|webOS|iPhone|iPod|iPad|BlackBerry/i.test(navigator.userAgent))
// document.write('<script type="text/javascript" src="js/main.js"><\/script>');

var numMin = 1;  
        var numMax = 10;  
        function add(){  
            var num = document.getElementById("num").value;       
            if(num==numMax || num > numMax){  
                document.getElementById("num").value = numMin;  
            }else{  
                document.getElementById("num").value++;  
            }  
        }  
          
        function minus(){  
            var num = document.getElementById("num").value;  
            if(num==numMin || num < numMin){  
                document.getElementById("num").value = numMax;  
            }else{  
                document.getElementById("num").value--;  
            }  
        }  
          
        function check(){  
            var num = document.getElementById("num");  
            if (isNaN(num.value)){  
                alert("Only number！");  
                num.value="";  
            }  
        }  

$('.navbar-toggle').click(function(){
		 
		 $('.collapse navbar-collapse').toggle();	
	  });
