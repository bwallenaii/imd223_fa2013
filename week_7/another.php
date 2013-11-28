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

<p>Welcome to some other more different content for <?php echo $user->username; ?></p>
<a href="mypage.php">Less</a>
<a href="logout.php">Log out</a>
</body>
</html><?php

?>