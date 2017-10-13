<?php
session_start();
include_once('user.php');
include_once('cat.php');
include_once('commande.php');
include_once('check.php');

only_admin();

if ($_POST && $_POST['action'] === "delete" && $_POST['com'] !== '')
{
    if (del_commande($_POST['com']))
    {
        $message = "succes of delete of " . htmlspecialchars($_POST['prod']);
    }
    else
    {
        $message = "error of delete of " . htmlspecialchars($_POST['prod']);
    }
}
if ($_POST && $_POST['action'] == "save" && $_POST['com'] != '' && $_POST['user'] != '' && $_POST['date'] != '' && $_POST['product'] != '')
{
    $user = check_commande($_POST['com']);
    if ($user === false)
    {
        $message = "error of adding " . htmlspecialchars($_POST['com']);
    }
    else if (add_commande($user))
    {
        $message = "succes of adding " . htmlspecialchars($_POST['com']);
    }
    else if (set_commande($_POST['com'], $user))
    {
        $message = "succes of save " . htmlspecialchars($_POST['com']);
    }
    else
    {
        $message = "error of adding " . htmlspecialchars($_POST['com']);
    }
}

$commande = get_commande_list();
$cat_list = get_cat_list();
$root = user_is_admin($_SESSION['user']);

$com_select = get_commande($_GET['edit']);

?><!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initiale-sacle=1.0">
    <head>
		<title>Pepe's Magic Shop</title>
		<link rel="stylesheet" href="index.css"/>
		<link rel="icon" href="favicon.ico">
    </head>
	<body>
<?php include('start.php'); ?>
		<div style="margin: auto;width: 1200px;">
		<p>Pour le panier, merci d'utiliser la syntaxe suivante: 'prod1:quantiter1/prod2:quantiter2'</p>
        <form action="admin_commande.php" method="POST">
            <?php if ($com_select){ ?>
                <p>edit <?php echo $_GET['edit']; ?></p>
                <input type="hidden" name="com" value="<?php echo $com_select[0]; ?>"></input>
            <?php } else { ?>
                id: <input type="text" name="com" value="<?php echo $com_select[0]; ?>"></input>
            <?php } ?>
                user: <input type="text" name="user" value="<?php echo $com_select[1]; ?>"></input>
                date: <input type="text" name="date" value="<?php echo $com_select[2]; ?>"></input>
                product: <input type="text" name="product" value="<?php echo $com_select[3]; ?>"></input>
                <input type="submit" name="action" value="save"></input>
                <?php if ($com_select){ ?>
                    <input type="submit" name="action" value="delete"></input>
                <?php } ?>
        </form><br /><br />
        </div>
        <div style="margin: auto;width: 1200px;">
            <h5><?php if ($message){ echo $message; } ?></h5>
		</div>
	<div style="width: 1000px;margin: auto;">
		<p>Commandes réalisées</p>
	</div>
	<br /><br /><br />
        <table style="margin: auto;width: 1000px;">
            <tr>
                <th>Id</th>
                <th>user</th>
                <th>date</th>
                <th>product</th>
                <th></th>
            </tr>
<?php foreach($commande as $c){ ?>
            <tr>
                <td><?php echo $c[0] ?></td>
                <td><?php echo $c[1] ?></td>
                <td><?php echo $c[2] ?></td>
                <td><?php echo $c[3] ?></td>
                <td><a href="admin_commande.php?edit=<?php echo urlencode($c[0]) ?>">edit / delete</a></td>
            </tr>
<?php } ?>
        </table>
    </body>
</html>
