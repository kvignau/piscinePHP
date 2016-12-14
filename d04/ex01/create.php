<?php
	if ($_POST['login'] != "" && $_POST['passwd'] != "" && $_POST['submit'] === "OK")
	{
		$_POST['passwd'] = hash('whirlpool', $_POST['passwd']);
		if (!file_exists("../private"))
			mkdir("../private");
		if (file_exists("../private/passwd"))
		{
			$unserial = unserialize(file_get_contents("../private/passwd"));
			if ($unserial)
			{
				foreach ($unserial as $value)
				{
					if ($value['login'] == $_POST['login'])
					{
						echo "ERROR\n";
						return (0);
					}
				}
			}
		}
		$tmp = $unserial or array();
		$tmp[] = array("login" => $_POST['login'], "passwd" => $_POST['passwd']);
		$serial = serialize($tmp);
		file_put_contents("../private/passwd", $serial);
		echo "OK\n";
	}
	else
		echo "ERROR\n";
?>