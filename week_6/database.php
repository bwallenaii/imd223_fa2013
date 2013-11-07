<?php
/**
 * 1. Database name and Host
 * 2. User name
 * 3. Password
 */
//make database connection
try
{
    $db = new PDO("mysql:dbname=examplefa2013;host=localhost", "examplefa2013", "pass123");
}
//nicely verify that the connection works
catch (Exception $e)
{
    die("Database connection failure: ".$e->getMessage());
}

date_default_timezone_set("America/Denver");