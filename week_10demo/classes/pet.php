<?php
require_once("table.php");
class Pet extends Table
{
	const GET_COLORS = "getColors";
	protected $tableName = "pets";
	
	public function Pet($id = null)
	{
		parent::__construct($id);
		$this->addStatement("getType", "SELECT * FROM `types` WHERE `id` = :id");
		$this->addStatement("getTemperament", "SELECT * FROM `temperaments` WHERE `id` = :id");
		$this->addStatement("getColorIds", "SELECT `color_id` FROM `pets_has_colors` WHERE `pet_id` = :id");
		$this->addStatement(self::GET_COLORS, "SELECT `name` FROM `colors` WHERE `id` = :colorid");
	}
	
	public static function count()
	{
		$db = new PDatabase();
		$count = $db->query("SELECT COUNT(`id`) AS `amount` FROM `pets`;")->fetchObject();
		return $count->amount;
	}
	
	public function getTemperament()
	{
		$temp = $this->runStatement("getTemperament", array(":id" => $this->temperament_id));
		if(!$temp)
		{
			return "";
		}
		return $temp->name;
	}
	
	public function getType()
	{
		$type = $this->runStatement("getType", array(":id" => $this->type_id));
		if(!$type)
		{
			return "";
		}
		return $type->type;
	}
	
	public function getColors()
	{
		$ret = array();
		
		$colorIds = $this->runStatement("getColorIds", array(":id" => $this->id), true, true);
		if(!$colorIds)
		{
			return $ret;
		}
		foreach($colorIds as $colorId)
		{
			$color = $this->runStatement(self::GET_COLORS, array(":colorid" => $colorId->color_id));
			if($color)
			{
				$ret[] = $color->name;
			}
		}
		return $ret;
	}
}