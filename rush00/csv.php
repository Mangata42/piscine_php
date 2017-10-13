<?php

function read_csv($fd)
{
	$ret = Array();
	while ($line = fgetcsv($fd))
	{
		$ret[] = $line;
	}
	return $ret;
}

function write_csv($fd, $arr)
{
	$err = true;
	ftruncate($fd, 0);
	fseek($fd, 0);
	foreach($arr as $l)
	{
		if (fputcsv($fd, $l) == false)
			$err = false;
	}
	return $err;
}

function csv_getcontent($file_name)
{
	$file_name = '../htdocs/private/' . $file_name;
	$fd = @fopen($file_name, 'r');
	if ($fd == false)
		return Array();
	flock($fd, LOCK_SH);
	$arr = read_csv($fd);
	flock($fd, LOCK_UN);
	fclose($fd);
	return $arr;
}

function query_array($array, $colone_id, $query_string)
{
	foreach ($array as $k => $l)
	{
		if ($l[$colone_id] == $query_string)
			return $k;
	}
	return false;
}

function query_file($file_name, $colone_id, $query_string)
{
	$array = csv_getcontent($file_name);
	if ($array === false)
		return false;
	return query_array($array, $colone_id, $query_string);
}

function get_query_file($file_name, $colone_id, $query_string)
{
	$array = csv_getcontent($file_name);
	if ($array === false)
		return false;
	$i = query_array($array, $colone_id, $query_string);
	if ($i === false)
		return false;
	return $array[$i];
}

function csv_putcontent($file_name, $colone_id, $query_string, $array)
{
	$file_name = '../htdocs/private/' . $file_name;
	@mkdir('../htdocs/private/', 0700, true);
	$fd = fopen($file_name, 'c+');
	if ($fd == false)
		return false;
	flock($fd, LOCK_EX);
	$arr = read_csv($fd);
	$index = query_array($arr, $colone_id, $query_string);
	$arr[$index] = $array;
	write_csv($fd, $arr);
	flock($fd, LOCK_UN);
	fclose($fd);
	return true;
}

function csv_delcontent($file_name, $colone_id, $query_string, $array)
{
	$ret = true;
	$file_name = '../htdocs/private/' . $file_name;
	$fd = fopen($file_name, 'c+');
	if ($fd == false)
		return false;
	flock($fd, LOCK_EX);
	$arr = read_csv($fd);
	$index = query_array($arr, $colone_id, $query_string);
	if ($index !== false)
		unset($arr[$index]);
	else
		$ret = false;
	$arr = array_values($arr);
	write_csv($fd, $arr);
	flock($fd, LOCK_UN);
	fclose($fd);
	return $ret;
}

function csv_addcontent($file_name, $array)
{
	$ret = true;
	$file_name = '../htdocs/private/' . $file_name;
	@mkdir('../htdocs/private/', 0700, true);
	$fd = fopen($file_name, 'c+');
	if ($fd == false)
		return false;
	flock($fd, LOCK_EX);
	$arr = read_csv($fd);
	if (query_array($arr, 0, $array[0]) === false)
		$arr[] = $array;
	else
		$ret = false;
	write_csv($fd, $arr);
	flock($fd, LOCK_UN);
	fclose($fd);
	return $ret;
}
