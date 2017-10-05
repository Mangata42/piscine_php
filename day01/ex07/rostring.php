#!/usr/bin/php
<?php

function ft_split($string)
{
	$i = 0;
	$array = explode(' ', $string);
	$arr_return = array();
	foreach ($array as $elem)
	{
		if ($elem != "")
		{
			$arr_return[$i] = $elem;
			$i++;
		}
	}
	return ($arr_return);
}

if ($argc <= 1)
$i = 1;
$y = 0;
$final_array = array();
$return_array = ft_split($argv[1]);
while ($i < count($return_array))
{
	$final_array[$y] = $return_array[$i];
	$y++;
	$i++;
}
$final_array[$y + 1] = $return_array[0];
echo trim(join(" ", $final_array))."\n";
?>