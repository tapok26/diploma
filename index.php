<?php
require_once 'bootstrap.php';

$url = SERVICE1_URL;
$fetcher = new Fetcher($url);
$data = $fetcher->fetch();

$parser = new Parser($data['content'], $url);
try {
	$parser->parse();
} catch (Exception $e) {
	echo $e->getMessage();
}