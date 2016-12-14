#!/usr/bin/php
<?PHP
	$result = null;
	$tab = explode(" ", $argv[1]);
	foreach ($tab as $value)
	{
		if ($value != null)
			$result .= $value." ";
	}
	$result = trim($result);
	if ($result != null)
		echo $result."\n";
?>
