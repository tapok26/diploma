<?php
class Parser {
	
	protected $unparsedData;
	protected $parsedData;
	private $url; 
	
	public function __construct($unparsedData = [], $url = SERVICE1_URL)
	{	
		if(!empty($unparsedData))
			$this->setData($unparsedData);
		
		$this->url = $url;
	}
	
	public function setUnparsedData($data)
	{
		if(!empty($data))
			$this->unparsedData = $data;
	}
	
	public function getParsedData()
	{
		return $this->parsedData;
	}
	
	public function parse($unparsedData)
	{	
		switch ($this->url) {
			case SERVICE1_URL:
				$type = 1;
			break;
			
			case SERVICE2_URL:
				$type = 2;
			break;
			
			default:
				$type = -1;
			break;
		}
		
		if($type < 1)
			throw new Exception('Не найден парсер для указанного источника');
		else{
			if(!$unparsedData)
				$unparsedData = $this->unparsedData;
			
			$this->{'parserType_'.$type}($unparsedData);
		}
	}
	
	/*lun.ua parser*/
	protected function parserType_1($unparsedData)
	{
		if(empty($unparsedData))
			$unparsedData = $this->unparsedData;
		
		phpQuery::newDocument($unparsedData);
		
		$arAdv = pq('.realty-card');
		foreach ($arAdv as $adv) {
			$obj = pq($adv);
			
			$tmp = $obj->find('.realty-card-characteristics__price')->text();
			$price = [
				'value' => preg_replace('/[^\d]/', '', $tmp),
				'currency' => stripos($tmp, 'грн') !== false ? 'UAH' : 'USD'
			];
			
			$tmp = $obj->find('.realty-card-characteristics__add-time')->text();
			if(stripos($tmp, 'сегодня')){
				$date = new DateTime('today');
			}elseif(stripos($tmp, 'вчера')){
				$date = new DateTime('yesterday');
			}else{
				$timestamp = IntVal(str_replace('/[\d]/', '', $tmp));
				$date = new DateTime();
				$date->setTimestamp($timestamp);
			}
			
			$timeAdd = [
				'date' => $date->format('Y-m-d'),
				'time' => $time 
			];
			
			$parsedData[] = [
				'street' => $obj->find('.realty-card-header-title__street')->text(),
				'region' => $obj->find('.realty-card-header__subtitle a:last')->text(),
				'microregion' => $obj->find('.realty-card-header__subtitle a:first')->text(),
				'price' => $price,
				'addTime' => $timeAdd,
			];
			
		}
		phpQuery::unloadDocuments();
		
		$this->setParsedData($parsedData);
	}
	
	protected function parserType_2()
	{
		// parse $this->data;
	}
	
	private function setParsedData($data)
	{
		if(!empty($data))
			$this->parsedData = $data;
	}
	
}