#!/usr/bin/php
<?PHP
	function ft_epur_str($str)
	{
		$result = null;
		$tab = explode(" ", $str);
		$tab += explode("\t", $str);
		foreach ($tab as $value)
		{
			if ($value != null)
				$result .= $value;
		}
		$result = trim($result);
		return ($result);
	}
	function ft_split($str)
	{
		$tab = explode(" ", $str);
		$result = [];
		foreach ($tab as $value)
		{
			if ($value != "")
				array_push($result, $value);
		}
		return ($result);
	}

	if ($argc != 2)
	{
		echo "Incorrect Parameters\n";
		return (0);
	}
	$test = ft_split($argv[1]);
	if ($test[3] != null)
	{
		echo "Syntax Error\n";
		return (0);
	 }
	$argv[1] = ft_epur_str($argv[1]);
	if (strpos($argv[1], "+"))
	{
		$tab = explode("+", $argv[1]);
		if (is_numeric($tab[0]) && is_numeric($tab[1]))
			echo $tab[0] + $tab[1]."\n";
		else
			echo "Syntax Error\n";
	}
	else if (strpos($argv[1], "-"))
	{
		$tab = explode("-", $argv[1]);
		if (is_numeric($tab[0]) && is_numeric($tab[1]))
			echo $tab[0] - $tab[1]."\n";
		else
			echo "Syntax Error\n";
	}
	else if (strpos($argv[1], "*"))
	{
		$tab = explode("*", $argv[1]);
		if (is_numeric($tab[0]) && is_numeric($tab[1]))
			echo $tab[0] * $tab[1]."\n";
		else
			echo "Syntax Error\n";
	}
	else if (strpos($argv[1], "/"))
	{
		$tab = explode("/", $argv[1]);
		if (is_numeric($tab[0]) && (is_numeric($tab[1]) && $tab[1] != 0))
			echo $tab[0] / $tab[1]."\n";
		else
			echo "Syntax Error\n";
	}
	else if (strpos($argv[1], "%"))
	{
		$tab = explode("%", $argv[1]);
		if (is_numeric($tab[0]) && is_numeric($tab[1]))
			echo $tab[0] % $tab[1]."\n";
		else
			echo "Syntax Error\n";
	}
	else
		echo "Syntax Error\n";
?>
