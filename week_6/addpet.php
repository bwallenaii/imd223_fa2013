<?php require_once("database.php"); ?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Add A Pet!!
	</title>
	<style>
		label{
			display: block;
			margin: 10px 0;
		}
		
		label.check{
			display: inline-block;
			margin: 5px;
		}
	</style>
</head>
<body>

<form action="processpet.php" method="post" enctype="multipart/form-data">

<label>
	Pet Name: <input type="text" name="name" />
</label>
<label>
	Price: <input type="text" name="price" />
</label>
<label>
	Date of Birth: <input type="text" name="dob" />
</label>
<label>
	Type of Animal:
	<select name="typeid">
		<option value="">Select a pet type. . .</option>
		<?php 
			$types = $db->query("SELECT * FROM `types`");
			foreach($types as $type)
			{
				$type = (Object) $type; //typecast to an object
				echo "<option value=\"$type->id\">".ucwords($type->type)."</option>";
			}
		?>
	</select>
</label>
<label>
	Temperament:
	<select name="tempid">
		<option value="">Select a temperment. . .</option>
		<?php 
			$temps = $db->query("SELECT * FROM `temperaments`");
			foreach($temps as $temp)
			{
				$temp = (Object) $temp; //typecast to an object
				echo "<option value=\"$temp->id\">".ucwords($temp->name)."</option>";
			}
		?>
	</select>
</label>
<h4>Select Colors of the Pet</h4>
<div>
<?php
	$colors = $db->query("SELECT * FROM `colors` ORDER BY `name` ASC");
	foreach($colors as $color)
	{
		$color = (Object) $color;
?>
<label class="check">
	<input name="colors[]" type="checkbox" value="<?php echo $color->id ?>" /> <?php echo $color->name ?>
</label>
<?php } ?>
</div>
<input type="submit" />
</form>
</body>
</html>