<?php
session_start();
include_once('cat.php');
include_once('user.php');

only_admin();

if ($_POST && $_POST['action'] == "delete" && $_POST['cat'] != '')
{
	if (del_cat($_POST['cat']))
	{
		$message = "succes of delete of " . htmlspecialchars($_POST['cat']);
	}
	else
	{
		$message = "error of delete of " . htmlspecialchars($_POST['cat']);
	}
}
if ($_POST && $_POST['action'] == "add" && $_POST['cat'] != '')
{
	if (add_cat(Array($_POST['cat'])))
	{
		$message = "succes of add " . htmlspecialchars($_POST['cat']);
	}
	else
	{
		$message = "error of add " . htmlspecialchars($_POST['cat']);
	}
}

$cats = get_cat_list();
$root = user_is_admin($_SESSION['user']);

?><!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width, initiale-sacle=1.0">
	<head>
		<title>Pepe's Magic Shop</title>
		<link rel="icon" href="favicon.ico">
		<link rel="stylesheet" href="index.css"/>
	</head>
	<body>
<?php
include ('start.php');
?>
		<?php if ($message){ echo $message; } ?>
		<div style="margin: auto;width: 300px;">
		<form method="POST">
			<input type="text" name="cat" value="">
			<input type="submit" name="action" value="add">
		</form>
		</div>
		<table style="margin: auto;">
			<tr>
				<td>User name</td>
				<td>is_admin</td>
				<td>edit</td>
			</tr>
<?php foreach($cats as $user){ ?>
			<tr>
				<td><?php echo $user[0] ?></td>
				<td>
					<form method="POST">
						<input type="hidden" name="cat" value="<?php echo $user[0] ?>">
						<input type="submit" name="action" value="delete">
					</form>
				</td>
			</tr>
<?php } ?>
		</table>
			<hr>
		<a href ="index.php" id="retour"> Retour à l'index </a>
	</body>
</html>
