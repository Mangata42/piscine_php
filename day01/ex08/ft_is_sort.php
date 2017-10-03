#!/usr/bin/php
<?php

function ft_is_sort($to_check)
{
	$i = 0;
	$tmp_array = $to_check;
	sort($tmp_array);
	while ($i < count($to_check))
	{
		if ($to_check[$i] != $tmp_array[$i])
			return (false);
		$i++;
	}
	return (true);
}
?>