<?php require_once("functions.php"); ?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Untitled Document
	</title>
</head>
<body>
	<p>
	<?php echo example("Hello, ", "how are you?"); ?>
	</p>
	<p>
		<?php
			echo example2("Goody, another", " string.", " Hooray!");
		?>
	</p>
	<p>
		<?php
			echo example2("Important");
		?>
	</p>
	<p>
		<?php
			//echo example();
		?>
	</p>
<?php
	$myRay = array(
		"name" => "Bob Hendricks",
		"title" => "Mr.",
		"job" => "Astronaut",
	);
	
	outputArray($myRay);
	
	//creating a user for other example
	
	$usr = new User("Bob");
	printUserName($usr);
?>
</body>
</html>