<?php
	/* This for the userpage, where they can book the tickets,
	relation : booking(bookid int , userName varchar(25) , noOfSeats , busNo)
	*/
	$userName = "\"".$_POST['usname']."\"";
	$noOfSeats = $_POST['nos'];
	$busNo = $_POST['bsn'];
	if(!empty($userName) && !empty($noOfSeats) && !empty($busNo))
	{
		
		$connect = new mysqli("localhost","root","","st1_project") or die("Unable to connect to MySQL Server.");
		$ins = "insert into booking (userName,noOfSeats,busNo) values (".$userName.",".$noOfSeats.",".$busNo.");";
		$connect->query($ins);
		$connect->close();
	}
	header("location:ST_Project_Userpage.php");
?>
