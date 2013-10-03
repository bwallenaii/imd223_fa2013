<?php
$paragraph = "Example PHP stuff!!";
$myRay = array("Bob", "Fred","Yes.");
$employee = array(
	'firstName' => "Chicken", 
	'lastName' => "Liver",
	'job' => "CEO",
	'age' => 53,
	'pay' => 12.75
);
$employee2 = new stdClass();
$employee2->firstName = "Roger";
$employee2->lastName = "Hendricks";
$employee2->job = "Mathemtician";

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>
	Untitled Document
	</title>
	<style>
		h3{
			color: blue;
		}
		nav a{
			color: red;
			text-decoration: none;
		}
		p {
			color: #aa0000;
		}
	</style>
</head>
<body>
<?php
	include("nav.php");
?>
<h3>My first PHP example</h3>
<pre>
<?php
	print_r($employee);
	print_r($employee2);
	var_dump($employee);
	var_dump($employee2);
	
?>
</pre>
<?php
	echo "\t<p>\r\n\t\t$paragraph\r\n\t</p>";
	echo "<p>$myRay[0] $myRay[1] $employee2->firstName</p>";
	foreach($employee2 as $key => $val)
	{
		echo "<p><strong>$key:</strong> $val</p>";
	}
?>

<?php include("nav.php"); ?>
</body>
</html>