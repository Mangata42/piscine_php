<?php
session_start();
include_once('user.php');
include_once('prod.php');
include_once('check.php');

only_admin();

if ($_POST && $_POST['action'] === "delete" && $_POST['prod'] !== '')
{
	if (del_prod($_POST['prod']))
	{
		$message = "succes of delete of " . htmlspecialchars($_POST['prod']);
	}
	else
	{
		$message = "error of delete of " . htmlspecialchars($_POST['prod']);
	}
}
/*if ($_POST && $_POST['action'] == "add" && $_POST['prod'] != '')
{
	$user = get_prod($_POST['prod']);
	if ($user)
		$user[2] = 'false';
	if ($user !== false && set_prod($_POST['prod'], $user))
	{
		$message = "succes of removing right for " . htmlspecialchars($_POST['prod']);
	}
	else
	{
		$message = "error of removing right for " . htmlspecialchars($_POST['prod']);
	}
}*/
if ($_POST && $_POST['action'] == "save" && $_POST['prod'] != '' && $_POST['price'] != '' && $_POST['image'] != '')
{
	$user = check_product($_POST['prod']);
	if ($user === false)
	{
		$message = "error of adding " . htmlspecialchars($_POST['prod']);
	}
	else if (add_prod($user))
	{
		$message = "succes of adding " . htmlspecialchars($_POST['prod']);
	}
	else if (set_prod($_POST['prod'], $user))
	{
		$message = "succes of save " . htmlspecialchars($_POST['prod']);
	}
	else
	{
		$message = "error of adding " . htmlspecialchars($_POST['prod']);
	}
}

$prods = get_prod_list();
$prod_select = get_prod($_GET['prod']);

$cat_list = get_cat_list();
$root = user_is_admin($_SESSION['user']);

include_once("./start.php");
?><!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width", initial-scale="1.0">
	<head>
		<title>Pepe's Magic Shop</title>
		<link rel="icon" href="favicon.ico">
		<link rel="stylesheet" href="index.css"/>
	</head>
	<body>
		<div style="margin: auto;width: 1200px;">
		<form action="admin_prod.php" method="POST">
			<?php if ($prod_select){ ?>
				<p>edit <?php echo $_GET['prod']; ?></p>
				<input type="hidden" name="prod" value="<?php echo $prod_select[0]; ?>"></input>
			<?php } else { ?>
				name: <input type="text" name="prod" value="<?php echo $prod_select[0]; ?>"></input>
			<?php } ?>
				Categorie: <input type="text" name="cat" value="<?php echo $prod_select[1]; ?>"></input>
				Price: <input type="text" name="price" value="<?php echo $prod_select[2]; ?>"></input>
				Image: <input type="text" name="image" value="<?php echo $prod_select[3]; ?>"></input>
				<input type="submit" name="action" value="save"></input>
				<?php if ($prod_select){ ?>
					<input type="submit" name="action" value="delete"></input>
				<?php } ?>
		</form><br /><br />
		</div>
		<div style="margin: auto;width: 1200px;">
			<h5><?php if ($message){ echo $message; } ?></h5>
		</div>
		<table style="margin: auto;">
			<tr>
				<td>Product name</td>
				<td>Categorie</td>
				<td>Price</td>
				<td>Image</td>
				<td>Edit</td>
			</tr>
<?php foreach($prods as $prod){ ?>
			<tr>
				<td><?php echo $prod[0] ?></td>
				<td><?php echo $prod[1] ?></td>
				<td><?php echo $prod[2] ?></td>
				<td><?php echo $prod[3] ?></td>
				<td><a href="admin_prod.php?prod=<?php echo urlencode($prod[0]) ?>">edit</a></td>
			</tr>
<?php } ?>
		</table>
    <html class="no-js">

		<hr>
		<a href ="index.php" id="retour"> Retour à l'index </a>
	</body>
</html>
