<?php
require_once("database.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Pets!
	</title>
</head>
<style>
.pet{
	margin: 10px;
	padding: 0;
	border-bottom: 1px black dashed;
}

.pet p{
	margin: 1px;
	padding: 0;
}

</style>
<body>
<?php
	$page = 0;
	$limit = 10;
	if(!empty($_GET['page']))
	{
		$page = $_GET['page'] - 1;
		$page = $page < 0 ? 0:$page;
	}
	$start = $page * $limit;
  $pets = runQuery($db, "SELECT * FROM `pets` LIMIT $start,$limit;");
  //counts total number of pets
  $countRes = runQuery($db, "SELECT COUNT(`id`) AS `amount` FROM `pets`;");
  $countObj = $countRes->fetch_object();
  $count = $countObj->amount;
  $totalPages = ceil($count/$limit);
  ?>
  <?php if($page > 0): ?>
  <a href="./?page=<?php echo $page; ?>">Prev</a>
  <?php endif; if($page < $totalPages-1): ?>
  <a href="./?page=<?php echo $page+2; ?>">Next</a>
  <?php
  endif;
  while($pet = $pets->fetch_object())
  {
  	$types = runQuery($db, "SELECT * FROM `types` WHERE `id` = $pet->type_id");
  	$type = $types->fetch_object();
  	
  	$temperamants = runQuery($db, "SELECT * FROM `temperaments` WHERE `id` = $pet->temperament_id");
  	$temp = $temperamants->fetch_object();
  	
  	//to get the colors, we need to quantify the data down since it is
  	//a many-to-many relationship
  	$colors = array();
  	
  	$colorResult = runQuery($db, "SELECT `color_id` FROM `pets_has_colors` WHERE `pet_id` = $pet->id");
  	while($colorId = $colorResult->fetch_object())
  	{
  		$cRes = runQuery($db, "SELECT `name` FROM `colors` WHERE `id` = $colorId->color_id");
  		$color = $cRes->fetch_object();
  		$colors[] = $color->name;
  	}
  	
  	echo "<div class=\"pet\">
  	<p>Name: $pet->name</p>
  	<p>Type: $type->type</p>
  	<p>Temperament: $temp->name</p>
  	<p>Color: ".implode(", ", $colors)."</p>
  	<p>Price: \$$pet->price</p>
  	</div>";
  }
?>
</body>
</html>