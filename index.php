<?php
require_once 'bootstrap.php';

$url = SERVICE1_URL;
//$storage = Storage::getInstance();

$fetcher = new Fetcher($url);
$unparsedData = $fetcher->fetch();

$parser = new Parser($unoarsedData, $url);

try {
	$parser->parse();
	$parsedData = $parser->getParsedData();
	
	/*try {
		$db = $storage->getConnection();
		$sql  = "INSERT INTO ". RENTS_TABLE ." SET cron_add_time=CURDATE(),?u";
		$db->query($sql,$parsedData);
	} catch (Exception $e) {
		
	}*/
} catch (Exception $e) {
	echo $e->getMessage();
}

?>