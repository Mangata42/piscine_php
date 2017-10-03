#!/usr/bin/php
<?php

$i = 0;
$array = explode(" ", $argv[1]);
$clean_array = array();
foreach ($array as $elem)
{
	if ($elem != "")
	{
		$clean_array[$i] = $elem;
		$i++;
	}
}
$string = implode(" ", $clean_array);
echo $string."\n";
?>