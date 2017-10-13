<?php

include_once('csv.php');
include_once('cat.php');

function get_prod_file_name()
{
	return "prod.csv";
}

function get_prod($name)
{
	return get_query_file(get_prod_file_name(), 0, $name);
}

function set_prod($name, $edit)
{
	$cat = explode('/', $edit[1]);
	$cat_list = get_cat_list();
	$aply_cat = Array();
	foreach ($cat as $c)
	{
		foreach ($cat_list as $cl)
		{
			if ($cl[0] == $c)
				$aply_cat[] = $c;
		}
	}
	$edit[1] = implode('/', $aply_cat);
	return csv_putcontent(get_prod_file_name(), 0, $name, $edit);
}

function del_prod($name)
{
	return csv_delcontent(get_prod_file_name(), 0, $name, $edit);
}

function get_prod_list()
{
	return csv_getcontent(get_prod_file_name());
}

function get_prod_cat_list($cat_query)
{
	$list = get_prod_list();
	if ($list == false)
		return false;
	$ret = Array();
	foreach ($list as $elem)
	{
		$cat = explode('/', $elem[1]);
		foreach ($cat as $c)
		{
			if ($c == $cat_query)
				$ret[$elem[0]] = $elem;
		}
	}
	return $ret;
}

function add_prod($prod)
{
	if (strstr($prod[0], '/') !== false)
		return false;
	if (strstr($prod[0], ':') !== false)
		return false;
	$cat = explode('/', $prod[1]);
	$cat_list = get_cat_list();
	$aply_cat = Array();
	foreach ($cat as $c)
	{
		foreach ($cat_list as $cl)
		{
			if ($cl[0] == $c)
				$aply_cat[] = $c;
		}
	}
	$prod[1] = implode('/', $aply_cat);
	return csv_addcontent(get_prod_file_name(), $prod);
}

function clean_prod()
{
	$prod_list = get_prod_list();
	$cat_list = get_cat_list();
	foreach ($prod_list as $elem)
	{
		$cat = explode('/', $elem[1]);
		$cat_list_aplly = Array();
		foreach ($cat as $c)
		{
			foreach ($cat_list as $cl)
			{
				if ($cl[0] == $c)
					$cat_list_aplly[] = $c;
			}
		}
		$elem[1] = implode('/', $cat_list_aplly);
		set_prod($elem[0], $elem);
	}
}

