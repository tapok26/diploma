<?php
class Parser {
	
	protected $data;
	private $url; 
	
	public function __construct($data = [], $url = SERVICE1_URL)
	{	
		if(!empty($data))
			$this->setData($data);
		
		$this->url = $url;
	}
	
	public function setData($data)
	{
		$this->data = $data;
	}
	
	public function parse()
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
		else
			$this->{'parserType_'.$type}($data);
	}
	
	/*lun.ua parser*/
	protected function parserType_1()
	{
		$html = str_get_html($this->data);
		$adv = $html->find('div.advertisement-card');
	}
	
	protected function parserType_2()
	{
		// parse $this->data;
	}
	
}