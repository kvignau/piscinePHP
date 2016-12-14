<?php
	if ($_POST['login'] != "" && $_POST['oldpw'] != "" && $_POST['newpw'] != "" && $_POST['submit'] === "OK")
	{
		$_POST['oldpw'] = hash('whirlpool', $_POST['oldpw']);
		if (file_exists("../private/passwd"))
		{
			$unserial = unserialize(file_get_contents("../private/passwd"));
			if ($unserial)
			{
				foreach ($unserial as $key => $value)
				{
					if ($value['login'] == $_POST['login'] && $value['passwd'] == $_POST['oldpw'])
					{
						$unserial[$key] = array("login" => $_POST['login'], "passwd" => hash('whirlpool', $_POST['newpw']));
						$serial = serialize($unserial);
						file_put_contents("../private/passwd", $serial);
						echo "OK\n";
						return (0);
					}
				}
			}
			echo "ERROR\n";
		}
	}
	else
		echo "ERROR\n";
?>