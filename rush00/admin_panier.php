<?php
	session_start();

	include('bdd_connect.php');

	$sql = "SELECT * FROM users";
	$req = mysqli_query ($link, $sql);
	echo '<div class="items">';
	if (mysqli_num_rows($req) == 0)
	{
		echo "Aucun panier";
	}
	else
	{
		while ($value = mysqli_fetch_assoc($req))
		{
			if ($value['panier'] != null && $value['panier'] != "")
			{
				echo '
						<h2>Panier de '.$value['login'].'</h2>';
							$tab = unserialize($value['panier']);
							if (!$tab)
								$tab =[];
							$prix = 0;
							foreach ($tab as $value)
							{
								$prix += $value['number'] * $value['prix'];
								echo 
									'<br />nom: '.$value['name'].' <br />
									<b>'.$value['prix'].' Euros </b><br />
									nombre: '.$value['number'];
							}
							echo '<br />PRIX TOTAL = '.$prix;
			}
		}
	}
?>
