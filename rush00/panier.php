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
				<a class="cat" href="">
					<p style="text-align: center; color: #ffffff; font-family: 'Trebuchet MS';">Mon panier</p>
				</a>
			</div>
		</div>
<?php
if (isset($_GET['archive']))
{
	if ($_GET['archive'] == "ko")
	{
?>
		<div class="msg err">
			Veuillez vous connecter pour valider votre commande
		</div>
<?php
	}
	else if ($_GET['archive'] == "ok")
	{
?>
		<div class="msg success">
			Votre commande a bien ete enregistre
		</div>
<?php
	}
}
?>
		<div class="content">
			<br />
				<p style="font-family: sans-serif;">Featured Products</p>
				<div class="corp">
<?php
	include('view_panier.php'); 
?>
			</div>
		</div>
	</body>
</html>
