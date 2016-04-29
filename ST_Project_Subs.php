<?php
	/*Updated on 09-03-16 with SQL mod by yours truely*/
	/*
		Using MySQLserver built in the XAMPP server, it can be heavily modified into a database making things a lot easier.
		The table is the the following relation:
		bus ( busNo int primary key, seatingCap int , routeNo int )
		
	*/
	$busno = $_POST["busno"];
	$seatcap = $_POST["seat"];
	$routeno = $_POST["rno"];
	if(!empty($busno) && !empty($seatcap) && !empty($routeno))		//Just to double check whether the input has arrived or not
	{
		$connect = new mysqli("localhost","root","","st1_project") or die ("Unable to connect to MySQL server.");	//For connection failure.
		$ins = "insert into bus values (".$busno.",".$seatcap.",".$routeno.");";
		$connect->query($empTable);
		$connect->query($ins);
		$connect->close();
	}
	
?>


<?php
	/*
		Relation:
		station(stationNo int primary key, stationName varchar(20), routeNo int);
	*/
	$stno = $_POST["stno"];
	$stname = "\"".$_POST["stname"]."\""; // this had to be modified for the sql to understand that it is onside the quotes.
	$rtno = $_POST["rrno"];			//rno , rrno are different so as to avoid confusion during the data transfer
	if(!empty($stno) && !empty($stname) &&!empty($rtno))
	{
		$connect = new mysqli("localhost","root","","st1_project") or die ("Unable to connect to MySQL server.");	//For connection failure.
		$ins = "insert into station values (".$stno.",".$stname.",".$rtno.");";
		$connect->query($ins);
		$connect->close();
	}
	
?>


<?php
	/*
		Relation : route(routeNo int primary key, src varchar(20) , destination varchar(20));
	*/
	
	$route = $_POST["arno"];
	$source ="\"". $_POST["source"]."\"";
	$desti = "\"".$_POST["desti"]."\"";
	if(!empty($route) && !empty($source) && !empty($desti) )
	{
		$connect = new mysqli("localhost","root","","st1_project") or die ("Unable to connect to MySQL server.");	//For connection failure.
		$ins = "insert into route values (".$route.",".$source.",".$desti.");";
		$connect->query($ins);
		$connect->close();
	}
	
	
?>


<?php
	/* For setting up new users, they can either be administrator or a user_error
		relation : users(userName varchar(20) primary key, pswd varchar(20), authority char(1))
		authority can be A if admin & U if user.
	*/
	$uname = "\"".$_POST["userName"]."\"";
	$pwd = "\"".$_POST["passwrd"]."\"";
	$auth = "\"".$_POST["autho"]."\"";
	
	if(!empty($uname) && !empty($pwd) && !empty($auth))
	{
		$connect = new mysqli("localhost","root","","st1_project") or die("Unable to connect to MySQL Server.");
		$ins = "insert into users values (".$uname.",".$pwd.",".$auth.");";
		$connect->query($ins);
		$connect->close();
	}
	header("location:ST_Project_Adminpage.php");
?>
