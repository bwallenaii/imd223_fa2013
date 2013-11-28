<?php require_once("verify.php"); ?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<title>
		Log in!
	</title>
	<link rel="stylesheet" type="text/css" href="css/screen.css" />
</head>
<body>
<h1>Hello <?php echo strtoupper($user->username); ?></h1>
<a href="another.php">More</a>
<a href="logout.php">Log out</a>
</body>
</html>