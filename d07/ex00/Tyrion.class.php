<?php

class Tyrion extends Lannister
{
	public function __construct()
	{
		parent::__construct();
		print('My name id Tyrion'.PHP_EOL);
		return;
	}

	public function getSize() {
		return "Short";
	}
}

?>