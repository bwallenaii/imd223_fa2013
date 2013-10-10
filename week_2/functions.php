<?php

class User{
	
	private $name;
	
	function User($name)
	{
		$this->name = $name;
	}
	
	function getName()
	{
		return $this->name;
	}
	
}

function example($arg1, $arg2)
{
	$ret = $arg1.$arg2;
	return $ret;
}

function example2($arg1, $arg2 = "**", $arg3 = "")//empty strings generally make better defaults
{
	$ret = $arg1.$arg2.$arg3;
	return $ret;
}

function outputArray(array $ar)
{
	echo "<pre>";
	print_r($ar);
	echo "</pre>";
}

function printUserName(User $user)
{
	echo $user->getName();
}