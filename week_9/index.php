<?php require_once("house.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>
		Class Demo
	</title>
</head>
<body>
	<?php
		$house1 = new House();
		$house2 = new House();
		
		//$house1->setTemperature(78);
		/*$house1->useHeater();
		$house1->useHeater();
		$house1->useHeater();*/
		
		while($house1->getTemperature() < House::TARGET_TEMPERATURE)
		{
			$house1->useHeater();
		}
		echo $house1->getTemperature()." ".$house2->getTemperature();
		echo "<br />";
		echo House::averageTemperature();
	?>
</body>
</html>