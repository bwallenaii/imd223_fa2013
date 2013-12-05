<?php require_once("house.php"); require_once("smallhouse.php"); ?>
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
		$house2 = new SmallHouse();
		
		//$house1->setTemperature(78);
		/*$house1->useHeater();
		$house1->useHeater();
		$house1->useHeater();*/
		
		while($house1->temperature < House::TARGET_TEMPERATURE)
		{
			$house1->useHeater();
		}
		
		echo $house1->temperature." ".$house2->temperature;
		echo "<br />";
		echo House::averageTemperature();
		echo "<br />";
		//$house2->temperature = "My name is joe";
		echo $house2->temperature;
		$house2->useHeater();
		echo "<br />";
		echo $house2->temperature;
	?>
</body>
</html>