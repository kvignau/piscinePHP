<?php
	session_start();

	if (isset($_POST['nb']) && $_POST['nb'] > 0)
	{
		if ($_POST['nb'] >= $_SESSION['panier'][$_POST['id']]['number'])
		{
			unset($_SESSION['panier'][$_POST['id']]);
		}
		else
		{
			$_SESSION['panier'][$_POST['id']]['number'] = $_SESSION['panier'][$_POST['id']]['number'] - $_POST['nb'];
		}
	}

	echo '<center><h1>Mon panier</h1><br />
		';
		if ($_SESSION['logged_in'] != "")
		{
	echo '<a href="archive_panier.php">Valider panier</a><br />';
		}
	if (isset($_SESSION['panier']) && $_SESSION['panier'])
	{
		echo '<a href="del_panier.php">vider mon panier</a></center>
			<div class="items">';
		foreach ($_SESSION['panier'] as $value) {
			$prix = $value['prix'] * $value['number'];
			if ($value['number'] > 0)
			{
				echo '
					<figure class="item">
						<img src="'.$value['image'].'" alt="item" title="item"/>
						<figcaption>
							<b>'.$value['number'].' * "'.$value['name'].'"<br /> => '.$prix.' Euros </b>
							<form method="post" action="">
								<input type="hidden" name="id" value="'.$value['id'].'"/>
								<input type="number" name="nb" max=100 min=0 maxlenght="3"/>
								<input type="submit" name="submit" value="remove"/>
							</form>
						</figcaption>
					</figure>';
					$total += $prix;
				}
		}
		echo '
			<b>Prix Total = '.$total.'</b>
			</div>';
	}
	else
		echo 'Aucun article dans le panier';
?>
