<?php
	session_start();

	unset($_SESSION['panier'][$_POST['id']]);
	header('location:panier.php');
?>
