<?php
	session_start();

	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != "")
	{
		include('bdd_connect.php');

		$sql = "DELETE FROM users WHERE login='".$_SESSION['logged_in']."'";

		$req = mysqli_query ($link, $sql);
		if ($req === TRUE)
		{
			$_SESSION['logged_in'] = "";
			header('location:index.php?del=ok');
		}
		else
		{
		    die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($link));
		    header('location:index.php?del=ko');
		}
	}
	else
	{
		header('location:index.php?c=nright');
	}
?>
