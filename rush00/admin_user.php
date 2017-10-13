<?php
session_start();
include_once('user.php');
include_once('cat.php');

only_admin();


if ($_POST && $_POST['action'] == "delete" && $_POST['user'] != '')
{
	if (del_user($_POST['user']))
	{
		$message = "succes of delete of " . htmlspecialchars($_POST['user']);
	}
	else
	{
		$message = "error of delete of " . htmlspecialchars($_POST['user']);
	}
}
if ($_POST && $_POST['action'] == "add to admin" && $_POST['user'] != '')
{
	$user = get_user($_POST['user']);
	if ($user)
		$user[2] = 'true';
	if ($user !== false && set_user($_POST['user'], $user))
	{
		$message = "succes of adding right for " . htmlspecialchars($_POST['user']);
	}
	else
	{
		$message = "error of adding right for " . htmlspecialchars($_POST['user']);
	}
}
if ($_POST && $_POST['action'] == "remove admin right" && $_POST['user'] != '')
{
	$user = get_user($_POST['user']);
	if ($user)
		$user[2] = 'false';
	if ($user !== false && set_user($_POST['user'], $user))
	{
		$message = "succes of removing right for " . htmlspecialchars($_POST['user']);
	}
	else
	{
		$message = "error of removing right for " . htmlspecialchars($_POST['user']);
	}
}

$users = get_user_list();
$cat_list = get_cat_list();
$root = user_is_admin($_SESSION['user']);

?><!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width, initiale-sacle=1.0">
	<head>
		<title>Pepe's Magic Shop</title>
        <link rel="stylesheet" href="index.css"/>
        <link rel="icon" href="favicon.ico">
	</head>
	<body>
<?php
include ('start.php');
?>
		<div style="margin: auto;width: 1000px;">
		<?php if ($_GET['user']){ ?>
		<form action="admin_user.php" method="POST">
			<h2>Utilisateur sélectionné: "<?php echo $_GET['user']; ?>"</h2>
			<p>Vous pouvez changer ses droits ou les supprimer</p>
			<input type="hidden" name="user" value="<?php echo $_GET['user']; ?>"></input>
			<input type="submit" name="action" value="delete"></input>
			<input type="submit" name="action" value="add to admin"></input>
			<input type="submit" name="action" value="remove admin right"></input></br></br>
		</form>
		<?php } ?>
		<?php if ($message){ echo $message; } ?>
		<p>Utilisateurs enregistrés</p>
		<br /><br /><br />
		</div>
		<table style="margin:auto;width: 1000px;">
			<tr>
				<th>Identifiant</th>
				<th>Droits</th>
				<th>Action</th>
			</tr>
<?php foreach($users as $user){ ?>
			<tr>
				<td><?php echo $user[0] ?></td>
				<td><?php if ($user[2] === 'true') echo 'Admin'; else echo '-' ?></td>
				<td><a href="?user=<?php echo urlencode($user[0]) ?>">edit</a></td>
			</tr>
<?php } ?>
		</table>
		<br /><br /><br />
		<hr>
		<a href ="index.php" id="retour"> Retour à l'index </a>
	</body>
</html>
