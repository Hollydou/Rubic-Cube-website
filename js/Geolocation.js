	var currentLocation;
	$(document).ready(function geoFindMe() {
		var output = document.getElementById("CurrentLocation"); 
		if (!navigator.geolocation) {
			output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
			return;
		}
		function success(position) {
			var latitude = position.coords.latitude; 
			var longitude = position.coords.longitude; 
			var coor = latitude + ", " + longitude;
			//save "coor" to database
			document.getElementById('input_field').value = coor;
		};
		// Auto-geolocating failed
		function error() {
			output.innerHTML = "Geolocation is not supported by your browsers";
		};
		navigator.geolocation.getCurrentPosition(success, error);
	})