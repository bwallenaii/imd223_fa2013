<?php require_once("database.php"); ?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<title>
		Register!
	</title>
	<link rel="stylesheet" type="text/css" href="css/screen.css" />
</head>
<body>
<?php 
	if(!empty($_SESSION['error'])):
?>
	<div class="error"><?php echo $_SESSION["error"]; $_SESSION["error"] = null; ?></div>
<?php endif; ?>
<?php 
	if(!empty($_SESSION['success'])):
?>
	<div class="success"><?php echo $_SESSION["success"]; $_SESSION["success"] = null; ?></div>
<?php endif; ?>
<form action="adduser.php" enctype="multipart/form-data" method="post">

	<label>
		User Name: <input name="username" />
	</label>
	<label>
		Password: <input name="password" type="password" />
	</label>
	<label>
		Verify Password: <input name="verify" type="password" />
	</label>
	<input type="submit" />
</form>

</body>
</html>