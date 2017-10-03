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
	sort($arr_return);
	return ($arr_return);
}
?>