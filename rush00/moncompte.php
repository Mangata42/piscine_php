<?php
session_start();
include_once("prod.php");
include_once("user.php");
include_once("check.php");
include_once("commande.php");
include_once("cat.php");

if ($_POST['change'] == "Nouveau" && $_POST['oldpw'] != "" && $_POST['newpw'] != '')
{
	if (auth_user($_SESSION['user'], $_POST['oldpw']))
	{
		$user = get_user($_SESSION['user']);
		if ($user !== false)
		{
			$user[1] = get_h_password($_POST['newpw']);
			set_user($_SESSION['user'], $user);
		}
	}
	else
		$msg = "mauvais mot de passe";
}
if ($_POST['supprimer'] == 'Supprimer')
{
	if (auth_user($_SESSION['user'], $_POST['oldpw']))
	{
		del_user($_SESSION['user']);
		unset($_SESSION['user']);
	}
	else
		$msg = "mauvais mot de passe";
}

only_log();
$com_list = get_user_commande($_SESSION["user"]);
if ($com_list == NULL)
	$com_list = Array();
$cat_list = get_cat_list();
$root = user_is_admin($_SESSION["user"]);

?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Pepe's Magic Shop</title>
		<link rel="icon" href="favicon.ico">
		<link rel="stylesheet" href="index.css"/>
	</head>
	<body>
<?php
include("start.php");
?>
<div class="category2 row">
<div class="category2 row"><?php if ($msg) echo "<h5>" . $msg . "</h5>"; ?></div>
<form style="center" action="" method="post">
	<h2>Modification de mot de passe</h2>
	<p>Merci d'entrer votre mot de passe actuel et votre nouveau mot de passe</p>
	Vérifiez bien que votre nouveau mot de passe est correct<br />
	<label class="label_input" for="oldpw">Ancien mot de passe:</label></br>
	<input type="password" name="oldpw" value=""></br>

	<label class="label_input" for="newpw">Nouveau mot de passe:</label></br>
	<input type="password" name="newpw" value=""></br>

	<input style="margin-right: 15px;" class="myButton submit_b" type="submit" name="change" value="Nouveau">
</form>
</div>
<div class="category2 row">
<form style="center" action="" method="post">
	<h2>Supprimer votre compte</h2>
	<p>Merci d'entrer votre mot de passe</p>
	Cette action est irréversible<br />
	<label class="label_input" for="oldpw">Mot de passe actuel</label></br>
	<input type="password" name="oldpw" value=""></br>

	<input style="margin-right: 15px;" class="myButton submit_b" type="submit" name="supprimer" value="Supprimer">
</form>
</div>

</div>
<div class="row">
<div style="text-align: center;" class="col l12">
<h2>Mes commandes</h2>
<?php foreach ($com_list as $panier) { ?>
<div style="text-align: center;" class="col l12">
<a style="text-decoration: none" href="panier.php?old=<?php echo $panier[0]; ?>">Commande: <?php echo $panier[2]; ?></a>
</div>
<?php } if (count($com_list) == 0) { ?>
<p>Vous n'avez pas encore effectué de commande</p>
<?php } ?>
</div>
</div>
	<hr>
		<a href ="index.php" id="retour"> Retour à l'index </a>
	</body>
</html>
