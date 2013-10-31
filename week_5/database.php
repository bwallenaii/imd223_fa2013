<?php
/**
 * 1. Host
 * 2. User name
 * 3. Password
 * 4. Database name
 */
//make database connection
$db = new mysqli("localhost", "examplefa2013", "pass123", "examplefa2013");
//verify connection works
if($db->connect_errno)
{
	die("Database no connecty. Big fail! $db->connect_errno: $db->connect_error");
}

function runQuery(Mysqli $m,$q)
{
	$ret = $m->query($q);
	if($m->errno)
  	{
  		//simple death
  		//die("your query sucks. Here is why: $m->error");
  		//Correct error throw
  		throw new Exception("your query sucks. Here is why: $m->error<br /><br />Query: $q");
  	}
  	
  	return $ret;
}