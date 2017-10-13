<?php
session_start();
include_once('prod.php');
include_once('user.php');
include_once('check.php');
include_once('cat.php');

if (array_key_exists("u_cart", $_SESSION) == false)
{
	$cart = array();
	$_SESSION["u_cart"] = $cart;
}

if ($_POST["action"] == "Ajouter")
{
	$item = $_POST["product"];
	$cart = $_SESSION["u_cart"];

	$cart["$item"]++;
	$_SESSION["u_cart"] = $cart;
}

if ($_POST["action"] == "Supprimer")
{
	$item = $_POST["product"];
	$cart = $_SESSION["u_cart"];

	if ($cart["$item"] > 0)
		$cart["$item"]--;
	if ($cart["$item"] == 0)
		unset($cart["$item"]);
	$_SESSION["u_cart"] = $cart; 
}

if ($_POST["action"] == "Reset")
{

	$cart = $_SESSION["u_cart"];
	$item = $_POST["product"];
	unset($cart["$item"]);
	$_SESSION["u_cart"] = $cart;
}

/*if ($_POST && $_POST['login'] != '' && $_POST['passwd'] != '' && $_POST['connect'] == 'Connectez-vous')
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
	if ($u !== false && add_user($u))
	{
		$message_create = 'User create';
		$message_create_type = 'succes';
	}
	else
	{
		$message_create = 'User already take';
		$message_create_type = 'error';
		echo $message_create;
	}
}*/

if ($_GET['cat'])
{
	$prod_list = get_prod_cat_list($_GET['cat']);
	$cat_name = $_GET['cat'];
}
else
	$prod_list = get_prod_list();

$cat_list = get_cat_list();
$root = user_is_admin($_SESSION['user']);


?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Pepe's Magic Shop</title>
		<link rel="icon" href="favicon.ico">
		<link rel="stylesheet" href="index.css"/>
	</head>
	<body>
		<div>
<?php
include('start.php');
?>
			<table style="margin: auto;">
<?php $mod = 0 ;
				if ($prod_list == false)
					echo "<h2>Pas de produit disponible</h2>";
				else {foreach ($prod_list as $product) {
					$mod = ($mod + 1) % 3;
					if ($mod == 1)
						echo "<tr>";
					?>
						
					<td><p style="margin-top: 10px;"><?php echo $product[0]; ?></p><br>
					<a href=""><img class="product" src="<?php echo $product[3]; ?>"></a></br>
					<p class="fontp"><?php echo $product[2]; ?>&euro;</p>
					<form method="post" action="product.php<?php if ($cat) echo "?cat=" . urlencode($cat_name); ?>">
							<input type="hidden" name="product" value="<?php echo $product[0]; ?>">
							<input class="myButton" type="submit" name="action" value="Ajouter">
							<input class="myButton" type="submit" name="action" value="Supprimer">
							<input class="myButton" type="submit" name="action" value="Reset">
							<input type="text" class="box_size" placeholder="nbr" readonly="true" value=<?php $cart = $_SESSION['u_cart']; echo $cart[$product[0]]; ?>>
					</form></br></td>
					<?php if ($mod == 0) { echo "</tr>"; } } } ?>
				</table>
		</div>
			<hr>
		<a href ="index.php" id="retour"> Retour à l'index </a>
	</body>
</html>
