<?php

include_once('csv.php');

function get_h_password($pass)
{
	return hash("whirlpool", "6d99d670b1711e66713ca79fb6c900b6" . $pass);
}

function get_user_file_name()
{
	return "user.csv";
}

function get_user($user_name)
{
	return get_query_file(get_user_file_name(), 0, $user_name);
}

function set_user($user_name, $edit)
{
	return csv_putcontent(get_user_file_name(), 0, $user_name, $edit);
}

function del_user($user_name)
{
	return csv_delcontent(get_user_file_name(), 0, $user_name, $edit);
}

function auth_user($login, $pass)
{
	$pass = get_h_password($pass);
	$user = get_user($login);
	if ($user == false)
		return false;
	if ($user[1] == $pass)
		return true;
	return false;
}

function get_user_list()
{
	return csv_getcontent(get_user_file_name());
}

function add_user($user)
{
	return csv_addcontent(get_user_file_name(), $user);
}

function user_is_admin($user)
{
	$u = get_user($user);
	if ($u === false)
		return false;
	return $u[2] === 'true';
}

function only_admin()
{
	if ($_SESSION['user'] == '' || !user_is_admin($_SESSION['user']))
	{
		header('Location: index.php');
		exit ;
	}
}

function only_log()
{
	if ($_SESSION['user'] == '' || get_user($_SESSION['user']) == false)
	{
		header('Location: index.php');
		exit ;
	}
}
