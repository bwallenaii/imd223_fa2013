<?php
require_once("database.php");
//make sure we have a user id stored
if(!empty($_SESSION["uid"]))
{
	$getUser = $db->prepare("SELECT * FROM `users` WHERE `id` = :id");
	//get the user and make sure we have one
	if($getUser->execute(array(":id" => $_SESSION["uid"])) && $getUser->rowCount() > 0)
	{
		$user = $getUser->fetchObject();
	}
	else
	{
		$_SESSION["error"] = "User not found";
		header("Location: login.php");
		exit;
	}
}
else
{
	$_SESSION["error"] = "You must be logged in to view this content";
	header("Location: login.php");
	exit;
}