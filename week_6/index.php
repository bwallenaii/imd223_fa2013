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
	$limit = 5;
	if(!empty($_GET['page']))
	{
		$page = $_GET['page'] - 1;
		$page = $page < 0 ? 0:$page;
	}
	$start = $page * $limit;
    $pets = $db->query("SELECT * FROM `pets` LIMIT $start,$limit;");
    $typePrep = $db->prepare("SELECT * FROM `types` WHERE `id` = :id");
    $tempPrep = $db->prepare("SELECT * FROM `temperaments` WHERE `id` = :id");
    $colorResult = $db->prepare("SELECT `color_id` FROM `pets_has_colors` WHERE `pet_id` = :petid");
    $cresPrep = $db->prepare("SELECT `name` FROM `colors` WHERE `id` = :colorid");
  //counts total number of pets
  $count = $db->query("SELECT COUNT(`id`) AS `amount` FROM `pets`;")->fetchObject();
  $totalPages = ceil($count->amount/$limit);
  ?>
  <?php if($page > 0): ?>
  <a href="./?page=<?php echo $page; ?>">Prev</a>
  <?php endif; if($page < $totalPages-1): ?>
  <a href="./?page=<?php echo $page+2; ?>">Next</a>
  <?php
  endif;
  foreach($pets as $pet)
  {
    $pet = (Object) $pet;
    $typePrep->execute(array(":id" => $pet->type_id));
  	$type = $typePrep->fetchObject();
    $tempPrep->execute(array(":id" => $pet->temperament_id));
  	$temp = $tempPrep->fetchObject();
  	
  	
  	//to get the colors, we need to quantify the data down since it is
  	//a many-to-many relationship
  	$colors = array();
  	
  	$colorResult->execute(array(":petid" => $pet->id));
  	foreach($colorResult as $colorId)
  	{
        $colorId = (Object) $colorId;
        $cresPrep->execute(array(":colorid" => $colorId->color_id));
  		$cRes = $cresPrep->fetchObject();
  		$color = $cRes;
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