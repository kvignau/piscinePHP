#!/usr/bin/php
<?PHP
	$i = 0;
	$result = [];
	foreach ($argv as $param) 
	{
		if ($i == 0)
			$i++;
		else
		{
			$tab = explode(" ", $param);
			foreach ($tab as $value)
			{
				if ($value != "")
					array_push($result, $value);
			}
		}
	}
	sort($result);
	$stop = count($result);
	for ($i = 0; $i < $stop; $i++)
	{
			echo $result[$i]."\n";
	}
?>