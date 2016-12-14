<?php
	session_start();

	include('bdd_connect.php');

	$r = [];
	$sql = "SELECT DISTINCT categories FROM items";
	$req = mysqli_query ($link, $sql);
	echo '<table class="category"><tr>';
	while ($value = mysqli_fetch_assoc($req))
	{
		$tab = explode(";", $value['categories']);
		foreach ($tab as $str)
		{
			array_push($r, $str);
		}
	}
	$r = array_unique($r);
	foreach ($r as $value)
	{
		echo '<td><a class="cat" href="index.php?cat='.$value.'">'.$value.'</a></td>';
	}
	echo '</tr></table>';

?>
