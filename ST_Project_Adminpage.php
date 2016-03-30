<title>ST_Project_AdminPage</title>
<head><link rel ="stylesheet" type="text/css" href="admin.css"></head>
<a class = "logout" href = "ST_Project_LoginPage.php">Logout</a>
<h1 class = "welcome"> Welcome, Administrator. </h1>
<div class = "ext">
	<h3 class = "header">Add Bus:</h3>
	<form method = "post" action = "ST_Project_Subs.php">
		<table>
			<tr><td class = "data">Enter bus number:					</td><td><input name = "busno" type = "number"/></td></tr>
			<tr><td class = "data">Enter seating capacity:				</td><td><input name = "seat" type = "number"/>	</td></tr>
			<tr><td class = "data">Enter the route number to follow:	</td><td><select name = "rno"/><?php 
																						$connect = new mysqli("localhost","root","","st1_project")or die("Unable to connect to MySQL Server.");
																						$que = "select routeNo from route";
																						$result = $connect->query($que);
																						while($row=$result->fetch_assoc())
																							echo "<option value = ".$row["routeNo"].">".$row["routeNo"]."</option>";
																						$connect->close();
																						?></select></td></tr>
			<tr><td><input type = submit />				</td></tr>
		</table>
	</form>
</div>

<div class = "ext">
<h3 class = "header">Add Station:</h3>
	<form method = "post" action = "ST_Project_Subs.php">
		<table>
			<tr><td class = "data">Enter station number:				</td><td><input type = "number" name = "stno" /></td></tr>
			<tr><td class = "data">Enter station name:					</td><td><input type = "text" name = "stname" /></td></tr>
			<tr><td class = "data">Enter the route number to follow:	</td><td><select name = "rrno"/><?php 
																						$connect = new mysqli("localhost","root","","st1_project")or die("Unable to connect to MySQL Server.");
																						$que = "select routeNo from route";
																						$result = $connect->query($que);
																						while($row=$result->fetch_assoc())
																							echo "<option value = ".$row["routeNo"].">".$row["routeNo"]."</option>";
																						$connect->close;
																						?></select></td></tr>
			<tr><td><input type = submit /></td></tr>
		</table>
	</form>

</div>

<div class = "ext">
<h3 class = "header">Add Route:</h3>
	<form method = "post" action = "ST_Project_Subs.php">
		<table>
			<tr><td class = "data">Enter route number:	</td><td><input type = "number" name = "arno"/></td></tr>
			<tr><td class = "data">Enter source:		</td><td><input type = "text" name = "source"/></td></tr>
			<tr><td class = "data">Enter destination:	</td><td><input type = "text" name = "desti" /></td></tr>
			<tr><td><input type = submit /></td></tr>
		</table>
	</form>
</div>


<div class = "ext">
<h3 class = "header">Add User:</h3>
	<form method = "post" action = "ST_Project_Subs.php">
		<table>
			<tr><td class = "data">Enter User Name : 	</td><td><input type = "text" name = "userName" />    </td></tr>
			<tr><td class = "data">Enter Password  :	</td><td><input type = "password" name = "passwrd" /></td></tr>
			<tr><td class = "data">Enter Authority :	</td><td><select name = "autho"/>
																					<option value = "A">Administrator</option>
																					<option value = "U">User</option>
																 </select></td></tr>
			<tr><td><input type = submit /></td></tr>
		</table>
	</form>

</div>



<table class = "foot">
	<tr>
		<td><h2>Total number of buses</h2></td>
		<td><h2>Total routes</h2></td>
		<td><h2>Total stations</h2></td>
	</tr>
	<tr>
		<td>
		<?php
			$connect = new mysqli("localhost","root","","st1_project");
			$count = "select distinct busNo from bus";
			$count = $connect->query($count);
			$count = mysqli_num_rows($count);
			echo $count;
			$connect->close();
		?>
		</td>
		<td>
		<?php
			$connect = new mysqli("localhost","root","","st1_project");
			$count = "select routeNo from route";
			$count = $connect->query($count);
			$count = mysqli_num_rows($count);
			echo $count;
			$connect->close();
			?>
		</td>
		<td>
		<?php
		
			$connect = new mysqli("localhost","root","","st1_project");
			$count = "select distinct stationNo from station";
			$count = $connect->query($count);
			$count = mysqli_num_rows($count);
			echo $count;
			$connect->close();
		?>
		</td>
	</tr>
</table>