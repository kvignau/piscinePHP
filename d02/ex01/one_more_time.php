#!/usr/bin/php
<?PHP
	if ($argc != 2)
		return (0);
	$match = preg_match("/^([Ll]undi|[Mm]ardi|[Mm]ercrdi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche)\s([0]?[1-9]|[1-2][0-9]|[3][0-1])\s([Jj]anvier|[Ff]evrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oc]tobre|[Nn]ovembre|[Dd]ecembre)\s([1][9][7-9][0-9]|[2-9][0-9]{3})\s([0-1][0-9]|[2][0-3]):[0-5][0-9]:[0-5][0-9]/", $argv[1]);
	if ($match == 0)
	{
		echo "Wrong Format\n";
		return (0);
	}
	$date = explode(" ", $argv[1]);
	$heure = explode(":", $date[4]);
	$array = array(01 => 'janvier', 02 => 'fevrier', 03 => 'mars', 04 => 'avril', 05 => 'mai', 06 => 'juin', 07 => 'juillet', 08 => 'aout', 09 => 'septembre', 10 => octobre, 11 => 'novembre', 12 => 'decembre');
	$mois = array_search(strtolower($date[2]), $array);
	echo mktime($heure[0], $heure[1], $heure[2], $mois, $date[1], $date[3], 1);
?>