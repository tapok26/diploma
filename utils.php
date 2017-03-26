<?php

function p2f($data, $die=false, $fileName='_dump.txt')
{
	$dump="<pre style='font-size: 11px; font-family: tahoma;'>".print_r($data, true)."</pre>";
	$file = __DIR__."/".$fileName;
	$fp = fopen( $file, "a+" );
	fwrite( $fp, $dump);
	fclose( $fp );
	if ($die) die();
}

function pre_dump()
{
	$arguments	= func_get_args();
	$die		= array_pop($arguments);
	if(!is_bool($die)){
		$arguments[] = $die;
	}
	echo "<br clear='all' />";
	echo "<pre>";
	call_user_func_array('var_dump', $arguments);
	echo "</pre>";
	if($die === true){
		die;
	}
}