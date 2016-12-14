#!/usr/bin/php
<?PHP
	$str = file_get_contents($argv[1]);
	$str = preg_replace_callback('/(title=")((.*)")/',
	function($matches){
		return $matches[1].strtoupper($matches[2]);
	}, $str);
	$str = preg_replace_callback('/(<a href=.*>)(.+)(<)/',
	function($matches){
		return $matches[1].strtoupper($matches[2]).$matches[3];
	}, $str);
	echo $str."\n";
?>