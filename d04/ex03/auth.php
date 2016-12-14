<?php
	function auth($login, $passwd)
	{
		if (file_exists("../private/passwd"))
		{
			$unserial = unserialize(file_get_contents("../private/passwd"));
			if ($unserial)
			{
				foreach ($unserial as $value)
				{
					if ($value['login'] == $login && $value['passwd'] == hash('whirlpool', $passwd))
					{
						return (true);
					}
				}
			}
			return (false);
		}
		return (false);
	}
?>