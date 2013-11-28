<?php require_once("database.php"); ?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<title>
		Log in!
	</title>
	<link rel="stylesheet" type="text/css" href="css/screen.css" />
</head>
<body>
<?php 
	if(!empty($_SESSION['error'])):
?>
	<div class="error message"><?php echo $_SESSION["error"]; $_SESSION["error"] = null; ?></div>
<?php endif; ?>
<?php 
	if(!empty($_SESSION['success'])):
?>
	<div class="success message"><?php echo $_SESSION["success"]; $_SESSION["success"] = null; ?></div>
<?php endif; ?>
<form action="auth.php" enctype="multipart/form-data" method="post">
	<label>
		User Name: <input name="username" />
	</label>
	<label>
		Password: <input name="password" type="password" />
	</label>
	<input type="submit" />
</form>

</body>
</html>