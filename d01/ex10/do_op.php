#!/usr/bin/php
<?PHP
	function ft_epur_str($str)
	{
		$tab = explode(" ", $str);
		$tab += explode("\t", $str);
		foreach ($tab as $value)
		{
			if ($value != null)
				$result .= $value." ";
		}
		$result = trim($result);
		return ($result);
	}

	if ($argc != 4)
	{
		echo "Incorrect Parameters\n";
		return (0);
	}
	$argv[1] = ft_epur_str($argv[1]);
	$argv[2] = ft_epur_str($argv[2]);
	$argv[3] = ft_epur_str($argv[3]);
	if (!is_numeric($argv[1]) OR !is_numeric($argv[3]))
	{
		echo "Incorrect Parameters\n";
		return (0);
	}
	switch ($argv[2])
	{
		case "+":
			echo $argv[1] + $argv[3]."\n";
			break;
		case "-":
			echo $argv[1] - $argv[3]."\n";
			break;
		case "*":
			echo $argv[1] * $argv[3]."\n";
			break;
		case "%":
			echo $argv[1] % $argv[3]."\n";
			break;
		case "/":
			if ($tab[2] != 0)
				echo $tab[0] / $tab[2]."\n";
			else
				echo "Incorrect Parameters\n";
			break;
		default:
			echo "Incorrect Parameters\n";
	}
?>
