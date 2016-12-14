#!/usr/bin/php
<?PHP
	function ft_is_sort($tab)
	{
		$tab2 = $tab;
		sort($tab2);
		if ($tab == $tab2)
			return (true);
		else
			return (false);
	}
?>