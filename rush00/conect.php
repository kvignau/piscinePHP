<?php
	session_start();

	if (isset($_POST['login']) && $_POST['login'] != "" && isset($_POST['passwd']) && $_POST['passwd'])
	{
		htmlentities ($_POST['login']);
		htmlentities ($_POST['passwd']);
		include('bdd_connect.php');

		$pwd = hash('whirlpool', $_POST['passwd']);
		$sql = "SELECT * FROM users WHERE login = '".$_POST['login']."' AND passwd = '".$pwd."'";
		$req = mysqli_query ($link, $sql);
		$r = mysqli_fetch_assoc($req);
		if ($r)
		{
			if ($r['admin'] == 1)
				$_SESSION['admin'] = 'ok';
			$_SESSION['logged_in'] = $_POST['login'];

			$tab = unserialize($r['panier']);
			if (!$tab)
				$tab =[];
			foreach ($tab as $value)
			{
				if ($_SESSION['panier'][$value['id']])
				{
					$_SESSION['panier'][$value['id']]['number'] = $_SESSION['panier'][$value['id']]['number'] + $value['number'];
				}
				else
					$_SESSION['panier'][$value['id']] = $value;
			}

			//$_SESSION['panier'] = unserialize($r['panier']);


			header("Location: index.php");
		}
		else
			header("Location: index.php?c=nco");
	}
	else
		header("Location: index.php?c=nco");
?>
