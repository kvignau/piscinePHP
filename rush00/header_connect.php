<div class="header">
			<a href="./index.php"><img src="./img/42_logo.svg" alt="logo" class="logo" /></a>
	<div class="account">
			<a class="cat count" href="./modif.php">Mon compte </a>|
		<?php
			if ($_SESSION['admin'] != "")
			{
		?>
				<a class="cat count" href="./admin.php">Espace admin </a>|
		<?php
			}
		?>
				<a class="cat count" href="./logout.php"> Se deconnecter</a><br />
	</div>
		<?php
		echo "Bonjour " . $_SESSION['logged_in']."<br /><br />";
	?>
</div>