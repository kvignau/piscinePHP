<?php
	session_start();

	include('bdd_connect.php');

	$sql = "SELECT * FROM items";
	$req = mysqli_query ($link, $sql);
	echo '<div class="items">';
	if (isset($_GET['cat']))
	{
		if ($_GET['cat'])
		{
			while ($value = mysqli_fetch_assoc($req))
			{
				$cat = explode(";", $value['categories']);
				if (in_array($_GET['cat'] ,$cat))
				{
					echo '
						<figure class="item">
							<img src="'.$value['image'].'" alt="item" title="item"/>
							<figcaption>
								<form method="post" action="add_panier.php">
									<input type="hidden" name="id" value="'.$value['id'].'"/>
									nom: '.$value['name'].' <br />
									<b>'.$value['prix'].' Euros </b><br />
									<input type="number" name="nb" max=100 min=0 maxlenght="3"/>
									<input type="submit" name="submit" value="add"/>
								</form>
							</figcaption>
						</figure>';
				}
			}
		}
		else
		{
			while ($value = mysqli_fetch_assoc($req))
			{
				echo '
					<figure class="item">
						<img src="'.$value['image'].'" alt="item" title="item"/>
						<figcaption>
							<form method="post" action="add_panier.php">
								<input type="hidden" name="id" value="'.$value['id'].'"/>
								nom: '.$value['name'].' <br />
								<b>'.$value['prix'].' Euros </b><br />
								<input type="number" name="nb" max=100 min=0 maxlenght="3"/>
								<input type="submit" name="submit" value="add"/>
							</form>
						</figcaption>
					</figure>';
			}
		}
	}
	else
	{
		while ($value = mysqli_fetch_assoc($req))
		{
			echo '
				<figure class="item">
					<img src="'.$value['image'].'" alt="item" title="item"/>
					<figcaption>
						<form method="post" action="add_panier.php">
							<input type="hidden" name="id" value="'.$value['id'].'"/>
							nom: '.$value['name'].' <br />
							<b>'.$value['prix'].' Euros </b><br />
							<input type="number" name="nb" max=100 min=0 maxlenght="3"/>
							<input type="submit" name="submit" value="add"/>
						</form>
					</figcaption>
				</figure>';
		}
	}
	echo '</div>';

?>
