<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>
<?php
if ($_SESSION['logged_in'] == "")
{
	include('header.php');
}
else
{
	include('header_connect.php');
}
?>
		<br />
		<div class="bucket">
			<div class="header" style="height: 50px; margin-right: 10%;">
					<a class="cat" href="panier.php"><p style="text-align: center; color: #ffffff; font-family: 'Trebuchet MS';">Mon panier</p></a>
			</div>
		</div>
<?php
if (isset($_GET['c']))
{
	if ($_GET['c'] == "nco")
	{
?>
		<div class="msg err">
			Combinaison login / mot de passe incorrecte
		</div>
<?php
	}
	else if ($_GET['c'] == "nright")
	{
?>
		<div class="msg err">
			Vous devez etre connecte pour acceder a cette page
		</div>
<?php
	}
}
else if (isset($_GET['admin']))
{
	if ($_GET['admin'] == "ko")
	{
?>
		<div class="msg err">
			Vous devez etre administrateur pour acceder a cette page
		</div>
<?php
	}
}
else if (isset($_GET['ajout']))
{
	if ($_GET['ajout'] == "ok")
	{
?>
		<div class="msg success">
			Le compte a bien ete cree
		</div>
<?php
	}
	else if ($_GET['ajout'] == "ko")
	{
?>
		<div class="msg err">
			Erreur. Le compte n'as pas ete cree
		</div>
<?php
	}
}
else if (isset($_GET['del']))
{
	if ($_GET['del'] == "supp")
	{
?>
		<div class="msg err">
			Erreur. Le produit n'a pas ete supprime
		</div>
<?php
	}
}
?>
		<div>
			<?php include('categorie.php'); ?>
		</div>
		<div class="content">
			<br />
				<p style="font-family: sans-serif;">Featured Products</p>
			<div class="corp">
				<?php include('items.php'); ?>
			</div>
		</div>
	</body>
</html>
