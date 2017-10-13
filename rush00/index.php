<?php
session_start();
include_once('user.php');
include_once('check.php');
include_once('prod.php');
include_once('cat.php');

if ($_POST && $_POST['login'] != '' && $_POST['passwd'] != '' && $_POST['connect'] == 'Connectez-vous')
{
	if (auth_user($_POST['login'], $_POST['passwd']) === true)
	{
		$message_login = 'Login succes !';
		$message_login_type = 'succes';
		$_SESSION['user'] = $_POST['login'];
	}
	else
	{
		$message_login = 'Login fail';
		$message_login_type = 'succes';
		unset($_SESSION['user']);
	}
}

if ($_POST && $_POST['delog'] === 'Se déconnecter')
{
	unset($_SESSION['user']);
}
if ($_POST && $_POST['login'] != '' && $_POST['passwd'] != '' && $_POST['register'] == 'Inscrivez-vous')
{
	$u = check_user();
	if ($u != false && add_user($u))
	{
		$message_create = 'User create';
		$message_create_type = 'succes';
		$_SESSION['user'] = $_POST['login'];
	}
	else
	{
		$message_create = 'User already take';
		$message_create_type = 'error';
	}
}

if ($_GET['cat'] != '')
	$prod_list = get_prod_list();
else
	$prod_list = get_prod_cat_list($_GET['cat']);

$cat_list = get_cat_list();
$root = user_is_admin($_SESSION['user']);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Pepe's Magic Shop</title>
		<link rel="icon" href="favicon.ico">
		<link rel="stylesheet" href="index.css"/>
	</head>
	<body>
<?php
include('start.php');
?>
		<div class="row bonjour">
		<img src="http://memes.ucoz.com/_nw/58/42444035.jpg" alt="Bonjour" title="Bonjour">
		</div>

		<div style="margin-bottom: 0px; padding-bottom: 5px" class="account row bottom">Find the DANKEST and the RAREST pepe's you'll ever find!</div>
	</body>
</html>
