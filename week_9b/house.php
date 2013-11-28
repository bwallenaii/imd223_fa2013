<?php

class House
{
	const TEMP_VARIANCE = 2;
	const TARGET_TEMPERATURE = 72;
	private static $houses = array();
	private $_temperature = 65;
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
		return $this->_temperature;
	}
	
	/**
	 * A setter for the temperature variable
	 * @argument	int	temp	the temperature to set the house to.
	 */
	public function setTemperature($temp)
	{
		//with forcing usage of the setter function,
		//we can enforce the data type of the temperature.
		$this->_temperature = (int) $temp;
	}
	
	/**
	 * Uses the air conditioner to change temperature minus TEMP_VARIANCE
	 */
	public function useAirConditioner()
	{
		$this->temperature -= self::TEMP_VARIANCE;
	}
	
	/**
	 * Uses heater to increase the temperature by TEMP_VARIANCE
	 */
	public function useHeater()
	{
		$this->temperature += self::TEMP_VARIANCE;
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
	
	public function __get($key)
	{
		$func = "get".ucfirst($key);
		if(method_exists($this, $func))
		{
			return $this->$func();
		}
		else
		{
			throw new Exception("$key is not available on this object.");
		}
	}
	
	public function __set($key, $value)
	{
		$func = "set".ucfirst($key);
		if(method_exists($this, $func))
		{
			$this->$func($value);
		}
		else
		{
			throw new Exception("$key is not available on this object.");
		}
	}
	
	public function __destruct()
	{
		//echo "A house has been destroyed";
	}
}