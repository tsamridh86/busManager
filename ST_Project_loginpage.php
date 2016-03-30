<title>ST_Project_loginpage</title>
<head> <link rel ="stylesheet" type="text/css" href="login.css">
</head>
<body>

<div class = "header"><h1 class= "movehead">Bus Managment System</h1></div>

<div class = "display" >
	<p>Select the route to display the details.</p>
	<form method = "get" action = "ST_Project_loginpage.php">
	<select name = "route">
		<option value = "None">---Select Route---</option>
		<?php
			$connect = new mysqli("localhost","root","","st1_project");
			$que = "select * from route";
			$result = $connect->query($que);
			while($row = $result->fetch_assoc())
				echo "<option value = ".$row["routeNo"].">".$row["src"]."-".$row["destination"]."</option>";
			$connect->close();			
		?>
	</select>
	<input type = submit />
	</form>
	<?php
		error_reporting(0);
		$routeno = $_GET["route"];
		if($routeno=="None" || $routeno == "" || $routeno == null)
			echo "You have not selected any route.";
		else 
		{
			echo "You have selected route no. ".$routeno;
			echo "<br><br>This route goes through the following stations.<br><br>";
			$connect = new mysqli("localhost","root","","st1_project");
			$que = "select stationNo, stationName from station where routeNo =".$routeno.";";
			$result = $connect->query($que);
			echo "<table width = 400>
				  <tr><td>Station number</td>
				      <td>Station name</td>
				  </tr>
				 ";
			while($row = $result->fetch_assoc())
			{ 
				echo "<tr><td>".$row["stationNo"]."</td>"; 
				echo "<td>".$row["stationName"]."</td></tr>";
				
			}
			echo"</table>";
			$connect->close();
		}
		
	?>
</div>

<div class = "bus">
	<h3 style = "color: green;">Buses on the selected route</h3>
	<br>
	<?php
		error_reporting(0);
		$routeno = $_GET["route"];
		if($routeno=="None" || $routeno == "" || $routeno == null) echo "Route not selected.";
		else
		{
			echo "The following buses are available:<br>";
			$connect = new mysqli("localhost","root","","st1_project");
			$que = "select busNo, seatCapacity from bus where routeNo =".$routeno.";";
			$result = $connect->query($que);
			echo "
				 <table width = 300>
				 <tr>
					<td>Bus number</td>
					<td>Bus capacity</td>
				 </tr>	
				 ";
			while ($row = $result->fetch_assoc())
			{
				echo "<tr><td>".$row["busNo"]."</td>";
				echo "<td>".$row["seatCapacity"]."</td></tr>";
			}
			echo"</table>";
			$connect->close();
		}
	?>
</div>




<div class = "login">	
		<h2 style = "color: green; font-family: 'Book Antiqua'">Admin login</h2>
		<form action = "ST_Project_NLI.php" method = "post">
			<table width = "350" height = "70" style = "color : red; font-size:17px; border-spacing : 5px;">
				<tr>
					<td class = "color">Username : </td>
					<td><input type = "text" name = "user" required></td>
				</tr>
				<tr>
					<td class = "color">Password : </td>
					<td><input type = "password" name = "pswd" required></td>
				</tr>
				<tr><td colspan = "2"><center><input type = submit value = "Log In"></center></td></tr>
			</table>
		</form>
</div>

<div class="footer">
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>

	<div id='gmap_canvas' style='height:100%;width:100%;'>
	<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
</div> <a href='https://embedmaps.net'>google map widget</a>
<script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=2c29f3b9c76075fb908f0263a8afd5a8e22bb408'></script>
<script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(28,84),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(28,84)});infowindow = new google.maps.InfoWindow({content:'<strong></strong><br><br> <br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
</div>

</body>