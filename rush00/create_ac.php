<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		<div class="header">
			<a href="./index.php"><img src="./img/42_logo.svg" alt="logo" class="logo" /></a>
		</div>
<?php
if (isset($_GET['ajout']))
{
	if ($_GET['ajout'] == "ko")
	{
?>
		<div class="msg err">
			Erreur lors de la creation du compte. Le compte n'as pas ete cree
		</div>
<?php
	}
}
?>
		<br />
		<div class="frmc">
			<form action="create_account.php" method="post">
				<label class="label2">Login: </label><input type="text" name="login" /><br />
				<label class="label2">Mot de passe: </label><input type="password" name="passwd"/><br />
				<input class="connect2" type="submit" name="submit" value="OK" />
			</form>
		</div>
	</body>
</html>

