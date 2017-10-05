#!/usr/bin/php
<?php

if ($argc != 4)
{
	echo "Incorrect Parameters"."\n";
	die;
}
if (trim($argv[2]) == "+")
	echo $argv[1] + $argv[3];
if (trim($argv[2]) == "-")
	echo $argv[1] - $argv[3];
if (trim($argv[2]) == "*")
	echo $argv[1] * $argv[3];
if (trim($argv[2]) == "/")
	echo $argv[1] / $argv[3];
if (trim($argv[2]) == "%")
	echo $argv[1] % $argv[3];

?>