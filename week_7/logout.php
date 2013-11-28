<?php
session_start();

$_SESSION["uid"] = null;
$_SESSION["success"] = "You are now logged out";

header("Location: login.php");