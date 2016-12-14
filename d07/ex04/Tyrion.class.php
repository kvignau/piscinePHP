<?php
class Tyrion
{
	function sleepWith($arg)
	{
		if ($arg instanceof Jaime || $arg instanceof Cersei)
		{
			print('Not even if I\'m drunk !'.PHP_EOL);
		}
		else if ($arg instanceof Sansa)
		{
			print('Let\'s do this.'.PHP_EOL);
		}
	}
}
?>