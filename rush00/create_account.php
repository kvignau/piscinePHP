<?php
	session_start();

	if ($_POST['login'] && $_POST['passwd'])
	{
		htmlentities ($_POST['login']);
		htmlentities ($_POST['passwd']);

		include('bdd_connect.php');

		$login = $_POST['login'];

		$sql = "SELECT * FROM users WHERE login = '".$_POST['login']."'";
		$req = mysqli_query($link, $sql);
		if (mysqli_num_rows($req) != 0)
		{
			header("Location: create_ac.php?ajout=ko");
			exit();
		}

		$pwd = hash('whirlpool', $_POST['passwd']);
		$sql = 'INSERT INTO users(login, passwd, admin) VALUES ("'.$_POST['login'].'", "'.$pwd.'", 0)';
		$req = mysqli_query ($link, $sql);
		if ($req === TRUE)
		{
			$_SESSION['logged_in'] = $_POST['login'];
			header('location:index.php?ajout=ok');
			exit();
		}
		else
		{
			header('location:create_ac.php?ajout=ko');
			exit();
		}
		
	}
	else
	{
		header('location:create_ac.php?ajout=ko');
		exit();
	}
?>
