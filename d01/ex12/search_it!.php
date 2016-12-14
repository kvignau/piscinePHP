#!/usr/bin/php
<?PHP
	for ($i = 2; $i < $argc; $i++)
	{
		if(strpos($argv[$i], ":") == false)
			return (0);
		$r = explode(":", $argv[$i]);
		if ($r[0] == $argv[1])
			$result = $r[1];
	}
	if ($result)
		echo $result."\n";
?>