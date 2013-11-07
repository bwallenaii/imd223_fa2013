<?php
require_once("database.php");

$newPet = $db->prepare("INSERT INTO `pets` (`type_id`,`temperament_id`,`name`,`age`,`birthdate`,`price`) VALUES (:type_id, :temperament_id, :name, :age, :birthdate, :price)");

$birthStamp = strtotime($_POST['dob']);

$ageInSeconds = time() - $birthStamp;
$ageInYears = floor($ageInSeconds/(60 * 60 * 24 * 365));

$birthDate = Date("Y-m-d", $birthStamp);

if($newPet->execute(array(
	":type_id" => $_POST['typeid'],
	":temperament_id" => $_POST['tempid'],
	":name" => $_POST['name'],
	":age" => $ageInYears,
	":birthdate" => $birthDate,
	":price" => $_POST['price']
)))
{
	$pet = $db->query("SELECT * FROM `pets` ORDER BY `id` DESC LIMIT 1")->fetchObject();
	$addColor = $db->prepare("INSERT INTO `pets_has_colors` (`pet_id`, `color_id`) VALUES (:pet_id, :color_id)");
	foreach($_POST['colors'] as $colorId)
	{
		$addColor->execute(array(
			":pet_id" => $pet->id,
			":color_id" => $colorId
		));
	}
	
	//find the last page of pets
	//counts total number of pets
	$limit = 5;
	$count = $db->query("SELECT COUNT(`id`) AS `amount` FROM `pets`;")->fetchObject();
	$totalPages = ceil($count->amount/$limit);
	//redirect
	header("Location: ./?page=$totalPages");
}
else
{
	die("De animal failed. Again try.");
}