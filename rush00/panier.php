<?php

session_start();
include_once('user.php');
include_once('commande.php');
include_once('prod.php');

if ($_POST['action'] == "reset")
{
	unset($_SESSION["u_cart"]);
}

$tab = Array();
if ($_SESSION["u_cart"])
{
	foreach ($_SESSION["u_cart"] as $p_name => $quantity)
	{
		$prod = get_prod($p_name);
		if ($prod !== false && $quantity > 0)
			$tab[] = Array($prod[0], $quantity, $prod[2]);
	}
}

if ($_GET['old'])
{
	$c = get_commande($_GET['old']);
	if ($c == false || $_SESSION['user'] != $c[1])
	{
		only_admin();
	}
	$tab_b = $c[3];
	$tab_b = explode('/', $tab_b);
	$tab = Array();
	foreach ($tab_b as $d)
	{
		$new = explode(':', $d);
		if (count($new) == 3 && is_numeric($new[2]))
		{
			$tab[] = $new;
		}
	}
}

if ($_SESSION["user"] == "")
	$need_login = true;

if ($_POST['action'] == "validate" && $_SESSION["user"] != "" && count($prod) != 0)
{
	$com = Array();
	foreach ($tab as $d)
	{
		$com[] = $d[0] . ":" . $d[1] . ":" . $d[2];
	}
	add_commande(Array(uniqid($_SESSION["user"]), $_SESSION["user"], date(DATE_RFC2822), implode('/', $com)));
	$_SESSION["u_cart"] = Array();
	$msg = "Commande validée";
}

$cat_list = get_cat_list();
$root = user_is_admin($_SESSION['user']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pepe's Magic Shop</title>
        <link rel="stylesheet" href="index.css"/>
        <link rel="icon" href="favicon.ico">
    </head>
    <body>
<?php
include('start.php');
?>
		<br/><br/><div style="margin: auto;width: 400px;"><?php if ($msg) echo $msg; ?></div><br/>
		<table style="margin: auto;">
			<tr>
				<td><u>Product name</u></td>
				<td style="border: 1px solid black;">price for 1</td>
				<td style="border: 1px solid black;">quantity</td>
				<td style="border: 1px solid black;">Price for all</td>
			</tr>
			<?php $price = 0;foreach ($tab as $d){ ?>
			<tr>
				<td style="border: 1px solid black;"><?php echo $d[0]; ?><img src=""></td>
				<td style="border: 1px solid black;"><?php echo $d[2]; ?></td>
				<td style="border: 1px solid black;"><?php echo $d[1]; ?></td>
				<td style="border: 1px solid black;"><?php echo $d[2] * $d[1];$price += $d[2] * $d[1]; ?></td>
            </tr>
            <tr>
				<td></td>
			<?php } ?>
			</tr>
		</table>
		<div style="margin: auto;width: 100px;border: 1px solid black;">Total: <?php echo $price."$"; ?></div>
		<div style="margin-bottom: 0px; padding-bottom: 5px" class="account row bottom">Find the DANKEST and the RAREST pepe's you'll ever find!</div>
		<?php if (!$_GET['old']) { ?>
		<div style="margin: auto;width: 400px;"><form method="POST">
		<h1>
			<?php if ($_SESSION["user"] == "" && $_GET['old'] == NULL) { ?>
								<input type="submit" name="action" value="reset"></br>
			<?php } if ($_SESSION["user"] == "")
					echo "Merci de vous connecter pour continuer";
					else
						{
							if ($msg == "Commande validée")
								;
							else if (count($tab) != 0)
								echo '<input type="submit" name="action" value="validate"> <input type="submit" name="action" value="reset"> ';
							else
								echo "Votre panier est vide";
						}
				?></h1>
		<form></div>
		<?php } ?>
    </body>
</html>
