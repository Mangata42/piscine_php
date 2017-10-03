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

function aff_array($array, $size)
{
	$i = 0;
	while ($i < $size)
	{
		echo $array[$i]."\n";
		$i++;
	}
}

$result_array = array();
$i = 1;
while ($i < $argc)
{
	$tmp_array = array();
	$tmp_array = ft_split($argv[$i]);
	$result_array = array_merge($result_array, $tmp_array);
	$i++;
}
sort($result_array);
aff_array($result_array, count($result_array));
?>