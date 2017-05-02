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

function RuEnDate($key)
{
	$key = strtolower(trim($key));
	
	$arr = [
		'январь' => 'January',
		'января' => 'January',
		'ферваль' => 'February',
		'ферваля' => 'February',
		'март' => 'March',
		'марта' => 'March',
		'апрель' => 'April',
		'апреля' => 'April',
		'май' => 'May',
		'мая' => 'May',
		'июнь' => 'June',
		'июня' => 'June',
		'июль' => 'July',
		'июля' => 'July',
		'август' => 'August',
		'августа' => 'August',
		'сентябрь' => 'September',
		'сентября' => 'September',
		'октябрь' => 'October',
		'октября' => 'October',
		'ноябрь' => 'November',
		'ноября' => 'November',
		'декабрь' => 'December',
		'декабря' => 'December',
	];
	
	return isset($arr[$key]) ? $arr[$key] : false; 
}