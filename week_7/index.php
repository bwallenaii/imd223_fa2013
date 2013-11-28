<?php 
	session_start();
	
	//cookie example
	setcookie("userid", "8451", strtotime("+1 month"));
	//end cookie example
?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<title>
		Ya.
	</title>
	<style>
		body{
			font-family: Courier;
		}
	</style>
</head>
<body>
<a href="login.php">Log in!</a>
<a href="register.php">Register!</a>
<?php
	/*if(!empty($_SESSION["test"]))
	{
		echo $_SESSION["test"]; 
	}
	if(!empty($_COOKIE["userid"]))
	{
		echo $_COOKIE["userid"]; 
	}*/
?>	
</body>
</html>