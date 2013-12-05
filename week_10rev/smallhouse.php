<?php
require_once("house.php");

class SmallHouse extends House
{
	const TEMP_VARIANCE = 3;
	
	public function useHeater()
	{
		$this->temperature += self::TEMP_VARIANCE;
	}
	
	public function useAirConditioner()
	{
		$this->temperature -= self::TEMP_VARIANCE;
	}
}