<?php
session_start();
if ($_SESSION['logged_in'] == "")
{
	header('Location: index.php?c=nright');
}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		<?php
			include('header_connect.php');
		?>
		<br />
		<div class="frmc">
			<form action="./modif_account.php" method="POST">
				<label class="label2">Ancien mot de passe: </label><input type="password" name="passwd" value="" /><br />
				<label class="label2">Nouveau mot de passe: </label><input type="password" name="newpwd" value="" /><br />
				<input class="connect2" type="submit" name="submit" value="OK" />
			</form>
			<a href="./del_account.php">supprimer le compte</a>
		</div>
	</body>
</html>
