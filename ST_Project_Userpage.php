<title>ST_Project_UserPage</title>
<head><link rel ="stylesheet" type="text/css" href="admin.css"></head>
<a class = "logout" href = "ST_Project_LoginPage.php">Logout</a>
<h1 class = "welcome"> Welcome, user</h1>
<?php
echo "<font size = 5>The following buses are available:<font size = 5><br><br>";
			$connect = new mysqli("localhost","root","","st1_project");
			$que = "select bus.busNo,seatCapacity,routeNo,seatCapacity - ifnull(reservedSeats,0) as remainingSeats
from 
	bus left outer 
	join (
		select 
			sum(noOfSeats) as reservedSeats, 
			busNo 
		from 
			booking 
		group by 
			busNo
	)as book
    ON bus.busNo = book.busNo";
			$result = $connect->query($que);
			echo "
				 <table width = 1000>
				 <tr>
					<td><font size = 5>Bus number</font></td>
					<td><font size = 5>Bus capacity</font></td>
					<td><font size = 5>On Route No.</font></td>
					<td><font size = 5>Remaining seats</font></td>
				 </tr>	
				 ";
			while ($row = $result->fetch_assoc())
			{
				echo "<tr><td>".$row["busNo"]."</td>";
				echo "<td>".$row["seatCapacity"]."</td>";
				echo "<td>".$row["routeNo"]."</td>";
				echo "<td>".$row["remainingSeats"]."</td></tr>";
			}
			echo"</table>";
			$connect->close();
			
		echo"
			<h3 >Book Ticket:</h3>
			<form method = 'post' action = 'ST_Project_Subs2.php'>
			<table>
				<tr><td>Enter Name of Person:	</td><td><input type = 'text' name = 'usname'/></td></tr>
				<tr><td>Enter No of Seats :		</td><td><input type = 'number' name = 'nos'/></td></tr>
				<tr><td>Enter Bus Number:		</td><td><select name = 'bsn'>"?><?php
															$connect = new mysqli("localhost","root","","st1_project")or die("Unable to connect to MySQL Server.");
															$que = "select busNo from bus";
															$result = $connect->query($que);
															while($row=$result->fetch_assoc())
																echo "<option value = ".$row["busNo"].">".$row["busNo"]."</option>";
															$connect->close; echo "</select></td></tr>
				<tr><td><input type = submit /></td></tr>
			</table>
		</form>
		";
		
?>