<?php
if (isset($_POST['submit']))
{

	$servername = "localhost";
	$username = "root";
	$password = "root";
	
	$conn = mysqli_connect($servername, $username, $password);

	if (!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "CREATE DATABASE rush00";

	if (mysqli_query($conn, $sql) === TRUE)
	{
		mysqli_close($conn);
		$conn = mysqli_connect($servername, $username, $password, "rush00");

		$sql = "CREATE TABLE items (
		id INT(11) NOT NULL,
		name VARCHAR(255) NOT NULL,
		categories VARCHAR(255) NOT NULL,
		prix float NOT NULL,
		image text NOT NULL)
		ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		if (mysqli_query($conn, $sql) === FALSE)
			die("Error: " . mysqli_error($conn));

		$sql = "INSERT INTO items (id, name, categories, prix, image) VALUES
			(1, 'Classique', 'Classe', 250, './img/classe1.jpeg'),
			(2, 'Courte', 'Classe', 200, './img/classe2.jpeg'),
			(3, 'Beige', 'Classe', 225, './img/classe3.jpeg'),
			(4, 'Grise', 'Classe', 300, './img/classe4.jpeg'),
			(5, 'Talon Aiguille', 'Femme', 175, './img/femme1.jpeg'),
			(6, 'Escarpin', 'Femme', 185, './img/femme2.jpeg'),
			(7, 'Noir Chic', 'Femme', 220, './img/femme3.jpeg'),
			(8, 'Bottine', 'Femme', 130, './img/femme4.jpeg'),
			(9, 'Basket', 'Sport', 85, './img/sport1.jpeg'),
			(10, 'Exterieur', 'Sport', 120, './img/sport2.jpeg'),
			(11, 'Classique', 'Sport', 95, './img/sport3.jpeg'),
			(12, 'Basses', 'Sport', 65, './img/sport4.jpeg');";
		
		if (mysqli_query($conn, $sql) === FALSE)
			die("Error: " . mysqli_error($conn));


		$sql = "CREATE TABLE users (
		id INT(11) NOT NULL,
		login VARCHAR(255) NOT NULL,
		passwd VARCHAR(255) NOT NULL,
		admin INT(1) NOT NULL DEFAULT '0',
		panier text NULL)
		ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		if (mysqli_query($conn, $sql) === FALSE)
			die("Error: " . mysqli_error($conn));

		$sql = "INSERT INTO users (id, login, passwd, admin) VALUES
		(1, 'admin', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', 1);";
		
		if (mysqli_query($conn, $sql) === FALSE)
			die("Error: " . mysqli_error($conn));

		$sql = "ALTER TABLE items
			ADD PRIMARY KEY (id);";

		if (mysqli_query($conn, $sql) === FALSE)
			die("Error: " . mysqli_error($conn));

		$sql = "ALTER TABLE users
			ADD PRIMARY KEY (id);";

		if (mysqli_query($conn, $sql) === FALSE)
			die("Error: " . mysqli_error($conn));

		$sql = "ALTER TABLE users
			MODIFY id INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;";	

		if (mysqli_query($conn, $sql) === FALSE)
			die("Error: " . mysqli_error($conn));

		$sql = "ALTER TABLE items
			MODIFY id INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;";	

		if (mysqli_query($conn, $sql) === FALSE)
			die("Error: " . mysqli_error($conn));

		header("refresh:1;url=index.php");
		echo "SUCCES\n";

	}
	else
   	{
		$sql = "DROP DATABASE rush00";
		mysqli_query($conn, $sql);
	}
	mysqli_close($conn);
}
?>

<html>
	<body>
		<form action="install.php" method="post">
			<input type="submit" name="submit" class="connect" value="Installer" />
		</form>
	</body>
</html>
