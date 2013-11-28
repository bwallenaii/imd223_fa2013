<?php

class House
{
	const TEMP_VARIANCE = 2;
	const TARGET_TEMPERATURE = 72;
	private static $houses = array();
	private $temperature = 65;
	private $numRooms;
	private $numWindows;
	
	public function House()
	{
		//echo "A new house has been built!";
		self::$houses[] = $this;
	}
	
	/**
	 * A getter for the $temperature variable
	 * @return int	current temperature of the house.
	 */
	public function getTemperature()
	{
		return $this->temperature;
	}
	
	/**
	 * A setter for the temperature variable
	 * @argument	int	temp	the temperature to set the house to.
	 */
	public function setTemperature($temp)
	{
		$this->temperature = $temp;
	}
	
	/**
	 * Uses the air conditioner to change temperature minus TEMP_VARIANCE
	 */
	public function useAirConditioner()
	{
		$this->setTemperature($this->temperature - self::TEMP_VARIANCE);
	}
	
	/**
	 * Uses heater to increase the temperature by TEMP_VARIANCE
	 */
	public function useHeater()
	{
		$this->setTemperature($this->temperature + self::TEMP_VARIANCE);
	}
	
	public static function averageTemperature()
	{
		$totalTemp = 0;
		foreach(self::$houses as $house)
		{
			$totalTemp += $house->getTemperature();
		}
		return $totalTemp/count(self::$houses);
	}
	
	public function __destruct()
	{
		//echo "A house has been destroyed";
	}
}