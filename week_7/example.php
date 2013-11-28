<?php
session_start();

$_SESSION["test"] = "ya bad.";
echo $_SESSION["test"];