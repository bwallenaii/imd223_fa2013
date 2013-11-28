<?php
require_once("database.php");

$getUser = $db->prepare("SELECT * FROM `users` WHERE `username` LIKE :username");

if($getUser->execute(array(":username" => $_POST["username"])) && $getUser->rowCount() > 0)
{
	$user = $getUser->fetchObject();
	if($user->password != hash("sha512", $salt.$_POST["password"]))
	{
		$_SESSION["error"] = "Login failed.You can try again if you like.";
		header("Location: login.php");
		exit;
	}
	else //password does match - log them in
	{
		$_SESSION["uid"] = $user->id;
		header("Location: mypage.php");
		exit;
	}
}

$_SESSION["error"] = "Login failed.You can try again if you like.";
header("Location: login.php");
exit;