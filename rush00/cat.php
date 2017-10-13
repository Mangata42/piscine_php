<?php

include_once('csv.php');
include_once('prod.php');

function get_cat_file_name()
{
	return "cat.csv";
}

function del_cat($name)
{
	$ret = csv_delcontent(get_cat_file_name(), 0, $name, $edit);
	clean_prod();
	return $ret;
}

function get_cat_list()
{
	return csv_getcontent(get_cat_file_name());
}

function add_cat($prod)
{
	if (strstr($prod[0], '/') !== false)
		return false;
	if (strstr($prod[0], '\\') !== false)
		return false;
    if (htmlspecialchars($prod[0]) != $prod[0])
        return false;
	return csv_addcontent(get_cat_file_name(), $prod);
}
