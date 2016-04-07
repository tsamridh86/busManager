<title>ST_Project_NLI</title>
<?php
	
	/*	Checking login authority 
		Login failure will display warning messages and redirects to login page.
		the usernames and thier respective passwords have been saved inside a table
		relation: users(userName,pswd,authority)
	*/
	
	$username = $_POST["user"];
	$password = $_POST["pswd"];
	$url = "ST_Project_loginpage.php";
	$connect = new mysqli("localhost","root","","st1_project");
	$adminData = "select userName , pswd from users where authority = 'A';";
	$userData  = "select userName, pswd from users where authority = 'U';";
	$adminData = $connect->query($adminData);
	$userData = $connect->query($userData);
	while($row=$adminData->fetch_assoc())
	{
		if($row["userName"]==$username && $row["pswd"]==$password)
		{
			$_SESSION['user']="admin";
			$_SESSION['pswd']="okay";
			header("location:ST_Project_Adminpage.php");
		}
	}
	while($row1=$userData->fetch_assoc())
	{
		if($row1["userName"]==$username && $row1["pswd"]==$password)
		{
			
			$_SESSION['user']="user";
			$_SESSION['pswd']="okay";
			header("location:ST_Project_Userpage.php");
			
		}
	}
	echo "You are not authorized to access this page. Click <a href = '$url'>here</a> to be redirected.";
	$connect->close();
?>