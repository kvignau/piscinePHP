#!/usr/bin/php
<?PHP
	$i = 0;
	$result = [];
	$tab = explode(" ", $argv[1]);
	foreach ($tab as $value)
	{
		if ($value != "")
			array_push($result, $value);
	}
	foreach ($result as $affiche)
	{
		if ($i < 1)
			$i++;
		else
			echo $affiche." ";
	}
	if ($result[0] != null)
		echo $result[0]."\n";
?>