<?php
	session_start();

	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != "" && isset($_POST['passwd']) && $_POST['passwd'])
	{
		include('bdd_connect.php');

		$pwd = hash('whirlpool', $_POST['passwd']);
		$sql = "SELECT * FROM users WHERE login = '".$_SESSION['logged_in']."' AND passwd = '".$pwd."'";
		$req = mysqli_query ($link, $sql);
		$r = mysqli_fetch_assoc($req);
		if ($r)
		{
			$newpwd = hash('whirlpool', $_POST['newpwd']);
			$sql = "UPDATE users SET passwd='".$newpwd."' WHERE id = '".$r['id']."'";
			mysqli_query ($link, $sql);
			header("Location: index.php");
		}
		else
			header("Location: modif.php?modif=ko");
	}
	else
	{
		header('location: modif.php?modif=ko');
	}
?>
