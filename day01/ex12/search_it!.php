#!/usr/bin/php
<?php
$flag = 0;
if ($argc < 3)
	die;
$key = ($argv[1]);
for ($i = 2; $i < $argc; $i++)
	$string = $string." ".$argv[$i];
$array = explode(" ", trim($string));
foreach ($array as $elem)
{
	$len = strlen($elem);
	$position_num = strpos($elem,':');
	$result_string = substr("$elem",0,$position_num);
	if ($result_string == $key)
	{
		$flag = 1;
		$after_double_point = strchr($elem, ':');
		$len_final = strlen($after_double_point);
		$after_double_point = substr("$after_double_point",1,$len_final);
	}
}
if ($flag == 1)
	echo "$after_double_point\n";
?>