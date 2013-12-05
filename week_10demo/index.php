<?php
require_once("classes/pet.php");
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
	$peti = new Pet();
    $pets = $peti->getPage($start, $limit);
    
  //counts total number of pets
  $totalPages = ceil(Pet::count()/$limit);
  ?>
  <?php if($page > 0): ?>
  <a href="./?page=<?php echo $page; ?>">Prev</a>
  <?php endif; if($page < $totalPages-1): ?>
  <a href="./?page=<?php echo $page+2; ?>">Next</a>
  <?php
  endif;
  foreach($pets as $pet)
  {
    echo "<div class=\"pet\">
  	<p>Name: $pet->name</p>
  	<p>Type: $pet->type</p>
  	<p>Temperament: $pet->temperament</p>
  	<p>Color: ".implode(", ", $pet->colors)."</p>
  	<p>Price: \$$pet->price</p>
  	</div>";
  }
?>
</body>
</html>