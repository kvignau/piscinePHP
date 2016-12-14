#!/usr/bin/php
<?PHP
	$i = 0;
	$tab_alpha = [];
	$tab_num = [];
	$tab_other = [];
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
	foreach ($result as $elem)
	{
		if (is_numeric(substr($elem, 0, 1)))
			array_push($tab_num, $elem);
		else if (ctype_alpha(substr($elem, 0, 1)))
			array_push($tab_alpha, $elem);
		else
			array_push($tab_other, $elem);
	}
	sort($tab_alpha, SORT_STRING | SORT_FLAG_CASE);
	sort($tab_num, SORT_STRING | SORT_FLAG_CASE);
	sort($tab_other, SORT_STRING | SORT_FLAG_CASE);
	$tab_alpha = array_merge($tab_alpha, $tab_num, $tab_other);
	foreach ($tab_alpha as $value) 
		echo $value."\n";
?>