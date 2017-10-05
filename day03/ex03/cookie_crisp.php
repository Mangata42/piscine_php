<?php

if ($_GET["action"] == "set")
{
	$cookie_name = $_GET["name"];
	$cookie_value = $_GET["value"];
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30));
}

if ($_GET["action"] == "get")
	echo $_COOKIE[$_GET["name"]];

if ($_GET["action"] == "del")
	setcookie($_GET["name"], "", time() - 3600);

?>