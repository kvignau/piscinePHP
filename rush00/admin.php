<?php
	session_start();
	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != "" && $_SESSION['admin'] != "")
	{
		include('bdd_connect.php');

	if ($_POST['image'] && $_POST['prix'] && $_POST['name'] && $_POST['categorie'] && $_POST['submit'] === 'OK')
	{
		$sql = "SELECT * FROM items WHERE name = '".$_POST['name']."'";
		$req = mysqli_query($link, $sql);
		if (mysqli_num_rows($req) != 0)
		{
			header("Location: create_account.html?action=ajout?ajout=ko");//produit existe deja
			exit();
		}
		$sql = 'INSERT INTO items(image, name, categories, prix) VALUES ("'.$_POST['image'].'", "'.$_POST['name'].'", "'.$_POST['categorie'].'", "'.$_POST['prix'].'")';
		$req = mysqli_query ($link, $sql);
		if ($req === TRUE)
		{
			header('location:admin.php?action=ajout&ajout=ok');
		}
		else
		{
			die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($link));
			header('location:admin.php?action=ajout&ajout=ko');
		}
	}
	else if ($_POST['image'] != "" && $_POST['prix'] != "" && $_POST['name'] != "" && $_POST['categorie'] != "" && $_POST['submit'] === 'modif')
	{
		$sql = 'UPDATE items SET image="'.$_POST['image'].'", name="'.$_POST['name'].'", categories="'.$_POST['categorie'].'", prix="'.$_POST['prix'].'" WHERE id='.$_POST['id'];
		$req = mysqli_query ($link, $sql);
		if ($req === TRUE)
		{
			header('location:admin.php?action=modif&modif=ok');
		}
		else
		{
			die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($link));
			header('location:admin.php?action=modif&modif=ko');
		}
	}
	else if ($_POST['modif_user'] === "modif admin")
	{
		$sql = 'UPDATE users SET admin="'.$_POST['admin'].'" WHERE id='.$_POST['id'];
		$req = mysqli_query ($link, $sql);
		if ($req === TRUE)
		{
			header('location:admin.php?action=user&modif=ok');
		}
		else
		{
			die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($link));
			header('location:admin.php?action=user&modif=ko');
		}
	}
	else if ($_POST['del_user'] === "del")
	{
		$sql = 'DELETE FROM users WHERE id='.$_POST['id'];
		$req = mysqli_query ($link, $sql);
		if ($req === TRUE)
		{
			header('location:admin.php?action=user&modif=ok');
		}
		else
		{
			die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($link));
			header('location:admin.php?action=user&modif=ko');
		}
	}
	else if ($_POST['submit'] === 'OK')
		header('location:admin.php?action=ajout&ajout=ko');
	else if ($_POST['submit'] === 'modif')
		header('location:admin.php?action=modif&modif=ko');
?>
	<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" href="styles.css">
		</head>
		<body>
		<?php
		include('header_connect.php');
		?>
		<div>
			<table class="category">
				<tr>
					<td><a class="cat" href="admin.php?action=ajout">Ajouter</a>
					<td><a class="cat" href="admin.php?action=modif">Modifier</a>
					<td><a class="cat" href="admin.php?action=user">Utilisateur</a>
					<td><a class="cat" href="admin.php?action=view">Voir panier</a>
				</tr>
			</table>
		</div>
		<?php

			if ($_GET['action'] == 'ajout')
			{
				if (isset($_GET['ajout']))
				{
					if ($_GET['ajout'] == "ko")
					{
		?>
						<div class="msg err">
							Erreur: Le produit existe deja
						</div>
		<?php
					}
				else if ($_GET['ajout'] == "ok")
				{
		?>
					<div class="msg success">
						Le produit a bien ete ajoute
					</div>
		<?php
				}
			}
		?>
				<div class="frmc">
					<form action="admin.php" method="post">
						<label class="label2">Image: </label><input type="text" name="image" /><br />
						<label class="label2">Nom: </label><input type="text" name="name" /><br />
						<label class="label2">Prix: </label><input type="text" name="prix" /><br />
						<label class="label2">Categorie: </label><input type="text" name="categorie"/><br />
						<input class="connect2" type="submit" name="submit" value="OK" />
					</form>
				</div>
			<?php
			}
			else if ($_GET['action'] == 'modif')
			{
				if (isset($_GET['modif']))
				{
					if ($_GET['modif'] == "ok")
					{
						echo '
						<div class="msg success">
							Le produit a bien ete ajoute
						</div>';
					}
					else if ($_GET['modif'] == "ko")
					{
						echo '
						<div class="msg err">
							Erreur: Merci de remplir tous les champs
						</div>';
					}
				}
				$sql = "SELECT * FROM items";
				$req = mysqli_query ($link, $sql);
				echo '<div class="items">';
				while ($value = mysqli_fetch_assoc($req))
				{
					echo '
						<figure>
						<div class="content">
							<img src="'.$value['image'].'" alt="item" title="item"/>
							<figcaption>
								<form method="post" action="">
									<input style="margin-left: auto; float: none;" type="hidden" name="id" value="'.$value['id'].'"/>
									lien img: <input style="margin-left: auto; float: none;" type="text" name="image" value="'.$value['image'].'"/><br />
									nom: <input style="margin-left: auto; float: none;" type="text" name="name" value="'.$value['name'].'"/><br />
									prix: <input style="margin-left: auto; float: none;" type="text" name="prix" value="'.$value['prix'].'"/><br />
									categorie: <input style="margin-left: auto; float: none;" type="text" name="categorie" value="'.$value['categories'].'"/><br />
									<input style="margin-left: auto; float: none;" type="submit" name="submit" value="modif"/>
								</form>
								<form method="post" action="del_item_bdd.php">
									<input type="hidden" name="id" value="'.$value['id'].'"/>
									<input type="submit" name="submit" value="del item"/>
								</form>
								</figcaption>
								</div>
						</figure>';
				}
				echo '</div>';
			}
			else if ($_GET['action'] == 'members')
			{
				if (isset($_GET['modif']))
				{
					if ($_GET['modif'] == "ok")
					{
						echo '
						<div class="msg success">
							Le produit a bien ete ajoute
						</div>';
					}
					else if ($_GET['modif'] == "ko")
					{
						echo '
						<div class="msg err">
							Erreur: Merci de remplir tous les champs
						</div>';
					}
				}
				$sql = "SELECT * FROM items";
				$req = mysqli_query ($link, $sql);
				echo '<div class="items">';
				while ($value = mysqli_fetch_assoc($req))
				{
					echo '
						<figure>
						<div class="content">
							<img src="'.$value['image'].'" alt="item" title="item"/>
							<figcaption>
								<form method="post" action="">
									<input style="margin-left: auto; float: none;" type="hidden" name="id" value="'.$value['id'].'"/>
									<input style="margin-left: auto; float: none;" type="text" name="image" value="'.$value['image'].'"/><br />
									<input style="margin-left: auto; float: none;" type="text" name="name" value="'.htmlentities ($value['name']).'"/><br />
									<input style="margin-left: auto; float: none;" type="text" name="prix" value="'.htmlentities ($value['prix']).'"/><br />
									<input style="margin-left: auto; float: none;" type="text" name="categorie" value="'.htmlentities ($value['categories']).'"/><br />
									<input style="margin-left: auto; float: none;" type="submit" name="submit" value="modif"/>
								</form>
								<form method="post" action="del_item_bdd.php">
									<input type="hidden" name="id" value="'.$value['id'].'"/>
									<input type="submit" name="submit" value="del item"/>
								</form>
								</figcaption>
								</div>
						</figure>';
				}
				echo '</div>';
			}
			else if ($_GET['action'] == 'user')
			{
				$sql = "SELECT * FROM users WHERE login <>'".$_SESSION['logged_in']."'";
				$req = mysqli_query ($link, $sql);
				echo '<div class="content">';
				while ($value = mysqli_fetch_assoc($req))
				{
					echo '
							<form method="post" action="">
								<input type="hidden" name="id" value="'.$value['id'].'"/>
								nom: '.$value['login'].'
								 admin: <select name="admin">
										  <option value="0">0</option> 
										  <option value="1">1</option>
										  <option value="'.$value['admin'].'" selected>'.$value['admin'].'</option>
										</select>
								<input type="submit" name="modif_user" value="modif admin"/>
								<input type="submit" name="del_user" value="del"/>
							</form>';
				}
				echo '</div>';
			}
			else if ($_GET['action'] == 'view')
			{
				echo '<div class="content">';
				include('admin_panier.php');
				echo '</div>';
			}
	}
	else
	{
		header('location:index.php?admin=ko');
	}
?>	
	</body>
</html>
