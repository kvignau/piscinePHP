<?php
	session_start();

	include('bdd_connect.php');

	$sql = "SELECT * FROM items WHERE id=".$_POST['id'];
	$req = mysqli_query ($link, $sql);
	while ($value = mysqli_fetch_assoc($req))
	{
		$item["name"] = $value["name"];
		$item["prix"] = $value["prix"];
		$item["categories"] = $value["categories"];
		$item["image"] = $value["image"];
		$item["id"] = $value["id"];

		if ($_SESSION['panier'][$_POST['id']])
		{
			$_SESSION['panier'][$_POST['id']]['number'] = $_SESSION['panier'][$_POST['id']]['number'] + $_POST['nb'];
		}
		else
		{
			$_SESSION['panier'][$_POST['id']] = $item;
			$_SESSION['panier'][$_POST['id']]['number'] = $_POST['nb'];
		}
		
	}
	$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
	header('Location: ' . $referer);
	//print($_SESSION['panier'][$_POST['id']]['number']);
	//$_SESSION['panier'][$_POST['id']]['categories']
?>