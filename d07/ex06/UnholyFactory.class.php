<?php
class UnholyFactory
{
	private $_allAbsorb = array();

	public function absorb($instance)
	{
		if ($instance instanceof Fighter)
		{
			$id = $instance->str;

			if (!$this->_allAbsorb[$id])
			{
				$this->_allAbsorb[$id] = $instance;
				print ('(Factory absorbed a fighter of type '.$id.')'.PHP_EOL);
			}
			else
			{
				print ('(Factory already absorbed a fighter of type '.$id.')'.PHP_EOL);
			}
		}
		else
			print ('(Factory can\'t absorb this, it\'s not a fighter)'.PHP_EOL);
	}

	public function fabricate($str)
	{
		if ($this->_allAbsorb[$str])
		{
			print('(Factory fabricates a fighter of type '.$str.')'.PHP_EOL);
			return ($this->_allAbsorb[$str]);
		}
		else
		{
			print('(Factory hasn\'t absorbed any fighter of type '.$str.')'.PHP_EOL);
			return (null);
		}
	}
}
?>