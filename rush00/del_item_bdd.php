<?php
	session_start();

	include('bdd_connect.php');

	if (isset($_SESSION['admin']) && $_SESSION['admin'] != "")
	{
		include('bdd_connect.php');

		$sql = "DELETE FROM items WHERE id=".$_POST['id'];

		$req = mysqli_query ($link, $sql);
		if ($req === TRUE)
		{
			$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
			header('Location: ' . $referer);
		}
		else
		{
		    die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($link));
		    header('location:index.php?del=nsupp');
		}
	}
	else
	{
		header('location:index.php?c=nright');
	}
?>
