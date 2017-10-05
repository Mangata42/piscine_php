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

$a_digit = array();
$a_alpha = array();
$a_weird = array();
$a_full = array();

$i = 1;
while ($i < $argc)
{
	$tmp_array = array();
	$tmp_array = ft_split($argv[$i]);
	$a_full = array_merge($a_full, $tmp_array);
	$i++;
}

$i = 0;
while ($i < count($a_full))
{
	if (ord($a_full[$i][0]) >= 48 && ord($a_full[$i][0]) <= 57)
		array_push($a_digit, $a_full[$i]);
	else if ((ord($a_full[$i][0]) >= 65 && ord($a_full[$i][0]) <= 90) || (ord($a_full[$i][0]) >= 97 && ord($a_full[$i][0]) <= 122))
		array_push($a_alpha, $a_full[$i]);
	else
		array_push($a_weird, $a_full[$i]);
	$i++;
}

sort($a_digit, SORT_STRING);
sort($a_weird);
usort($a_alpha, 'strnatcasecmp');
aff_array($a_alpha, count($a_alpha));
aff_array($a_digit, count($a_digit));
aff_array($a_weird, count($a_weird));
?>