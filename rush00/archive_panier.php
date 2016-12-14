<?php
	session_start();

	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != "")
	{
		include('bdd_connect.php');

		if (!isset($_SESSION['panier']) || $_SESSION['panier'] == "")
		{
			$sql = "UPDATE users SET panier='".null."' WHERE login='".$_SESSION['logged_in']."'";
			mysqli_query ($link, $sql);
		}
		else
		{
			$serial = serialize($_SESSION['panier']);
			$sql = "UPDATE users SET panier='".$serial."' WHERE login='".$_SESSION['logged_in']."'";
			mysqli_query ($link, $sql);
		}
		header("Location: panier.php?archive=ok");
	}
	else
	{
		header('location: panier.php?archive=ko');
	}
?>

?>
