<?php
require_once("database.php");

$addUser = $db->prepare("INSERT INTO `users` (`username`,`password`) VALUES (:username, :password)");
$getUser = $db->prepare("SELECT * FROM `users` WHERE `username` LIKE :username");
//verify password match
if($_POST['password'] != $_POST['verify'])
{
	$_SESSION["error"] = "Passwords did not match";
	header("Location: register.php");
	exit;
}

//Make sure the user doesn't exist
$getUser->execute(array(":username" => $_POST["username"]));

if($getUser->rowCount() > 0)
{
	$_SESSION["error"] = "User ".$_POST['username']." already exists. Again try!";
	header("Location: register.php");
	exit;
}
//=================================

//encrypt the password

$addUser->execute(array(
	":username" => $_POST['username'],
	":password" => hash("sha512", $salt.$_POST["password"])
));

?>
<html>
<head>
<meta charset="utf-8">
	<title>
		Register!
	</title>
	<link rel="stylesheet" type="text/css" href="css/screen.css" />
</head>
<body>
<h1>Thank you!!</h1>
<p>You are now registered as a user. You can <a href="login.php">log in</a> now!</p>

</body>
</html>