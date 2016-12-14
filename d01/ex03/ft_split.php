#!/usr/bin/php
<?PHP
	function ft_split($str)
	{
		$tab = explode(" ", $str);
		$result = [];
		foreach ($tab as $value)
		{
			if ($value != "")
				array_push($result, $value);
		}
		sort($result);
		return ($result);
	}
?>
