<?php
$cat_list = get_cat_list();
?>
<!DOCTYPE html>
<div class="account row">
	<p class="basket col l1">
	<a href="panier.php" class="basket myButton" type="button"><img class="basket_img" src="./src/basket.png"></a>
		<p class="col l1 w12"></p>
		<p class="title col l1"><a href="index.php"><img class="lic" title="Pepe" alt="unimal" src="http://www.stickpng.com/assets/images/5845cd430b2a3b54fdbaecf8.png"></a></p>
	<div class="row">
<?php
if ($_SESSION['user'] == NULL)
{
?>
		<form action="index.php" method="post">
		<div class="inline col l3">
<?php
	if($message_create == 'User already take')
	{
?>
			<label style="color: red;" class="label_input" for="login">Ce nom est déja pris:</label>
<?php
	}
	else{
?>
			<label class="label_input" for="login">Votre nom:</label>
<?php
	}
?>
			<input id="login" placeholder="login" type="text" name="login" value="<?php  ?>">
		</div>
		<div class="inline col l3">
<?php
	if($message_login == 'Login fail')
	{
?>
			<label style="color: red;"  class="label_input" for="passwd">Mauvais mot de passe:</label>
<?php
	}
	else{
?>
			<label class="label_input" for="passwd">Votre mot de passe:</label>
<?php
	}
?>
			<input type="password" placeholder="password" id="passwd" name="passwd" value="">
			</div>
			<div class="inline col l3">
			<input class="myButton submit_b" type="submit" name="connect" value="Connectez-vous">
			</div> 
						<div class="inline col l3">
							<input class="myButton submit_b" type="submit" name="register" value="Inscrivez-vous">
						</div> 
					</form>
<?php
}
else{
	if ($_POST['delog'] !== 'true')
	{
?>
	<div class="inline col l3 label_input">Bonjour <?php echo $_SESSION['user']; ?></div>
					<form action="index.php" method="post">
						<input class="myButton submit_b" type="submit" name="delog" value="Se déconnecter"> 
					</form>
<?php
	}
}
?>
			</div>
		</div>
		<div class="category row">
			<div class="cat col l1"><a href="product.php" class="butcat cat" type="button">All</a></div>
<?php
foreach ($cat_list as $cat) {
?>
	<div class="cat col l1"><a href="product.php?cat=<?php echo $cat[0];?>" class="butcat cat" type="button">
<?php
	echo $cat[0]; ?>
				</a></div>
<?php
}
if ($_SESSION['user'])
{
?>
		<div class="cat col l1"><a href="moncompte.php" class="butcat cat" type="button">Mon compte</a></div>
<?php
}
if ($root)
{
?>
		<div class="cat col l1"><a href="admin_user.php" class="butcat cat" type="button">Utilisateur</a></div>
		<div class="cat col l1"><a href="admin_commande.php" class="butcat cat" type="button">Commande</a></div>
		<div class="cat col l1"><a href="admin_cat.php" class="butcat cat" type="button">Catégorie</a></div>
		<div class="cat col l1"><a href="admin_prod.php" class="butcat cat" type="button">Produit</a></div>
<?php
}
?>
		</div>
