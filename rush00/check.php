<?php

function	check_user()
{
	$user = $_POST['login'];
	if (strstr($user, '/') !== false)
		return false;
	if (strstr($user, '\\') !== false)
		return false;
	if (htmlspecialchars($user) != $user)
		return (false);
	$passwd = get_h_password($_POST['passwd']);
	$root = 'false';
	$array = array($user, $passwd, $root);	
	return ($array);
}

function	check_product()
{
	$prod = $_POST['prod'];
	$cat = $_POST['cat'];
	$price = $_POST['price'];
	$image = $_POST['image'];
	if (strstr($cat, '\\') !== false)
		return false;
	if (strstr($prod, '\\') !== false)
		return false;
	if (strstr($image, '\\') !== false)
		return false;
	$array = array($prod, $cat, $price, $image);
	if (htmlspecialchars($prod) != $prod)
		return (false);
	if (htmlspecialchars($cat) != $cat)
		return (false);
	if (htmlspecialchars($price) != $price)
		return (false);
	if (htmlspecialchars($image) != $image)
		return (false);
	if (is_numeric($price) === false)
		return false;
	if ($price <= 0)
		return false;
	return ($array);
}

function	check_commande()
{
	$name = $_POST['com'];
	$user = $_POST['user'];
	$date = $_POST['date'];
	$product = $_POST['product'];
	$array = array($name, $user, $date, $product);
	if (strstr($name, '\\') !== false)
		return false;
	if (strstr($user, '\\') !== false)
		return false;
	if (strstr($date, '\\') !== false)
		return false;
	if (strstr($product, '\\') !== false)
		return false;
	if (htmlspecialchars($name) != $name)
		return (false);
	if (htmlspecialchars($user) != $user)
		return (false);
	if (htmlspecialchars($date) != $date)
		return (false);
	if (htmlspecialchars($product) != $product)
		return (false);
	return ($array);
}
