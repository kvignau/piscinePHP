#!/usr/bin/php
<?PHP
	$stdin = fopen('php://stdin', 'r');
	while (!feof($stdin))
	{
		echo "Entrez un nombre: ";
		$line = trim(fgets($stdin));
		if (is_numeric($line))
		{
			if ($line % 2 == 0)
				echo "Le chiffre ".$line." est Pair\n";
			else
				echo "Le chiffre ".$line." est Impair\n";
		}
		else
		{
			if (feof($stdin))
				echo "^D\n";
			else
				echo "'".$line."' n'est pas un chiffre\n";
		}
	}
	fclose($stdin);
?>
