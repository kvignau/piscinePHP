#!/usr/bin/php
<?PHP
	echo trim(preg_replace("/[[:blank:]]+/", " ", $argv[1]))."\n";
?>