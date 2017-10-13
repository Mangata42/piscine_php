<?php

include_once('csv.php');

function get_commande_file_name()
{
	return "commande.csv";
}

function del_commande($name)
{
	return csv_delcontent(get_commande_file_name(), 0, $name, $edit);
}

function get_user_commande($name)
{
	$ret = Array();
	foreach (get_commande_list() as $i)
	{
		if ($i[1] == $name)
			$ret[] = $i;
	}
	return $ret;
}
function get_commande($name)
{
	return get_query_file(get_commande_file_name(), 0, $name);
}

function get_commande_list()
{
	return csv_getcontent(get_commande_file_name());
}

function add_commande($prod)
{
	return csv_addcontent(get_commande_file_name(), $prod);
}

function set_commande($name, $edit)
{
    return csv_putcontent(get_commande_file_name(), 0, $name, $edit);
}
