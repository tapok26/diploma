<? 
require_once 'tools/dbconn.php';
class Storage{
	 
	private $db;
	private static $_instance = null;
	
	private function __construct() {}
	
	protected function __clone() {}
	
	public static function getInstance()
	{
		if(is_null(self::$_instance)){
			self::$_instance = new self();
			self::$_instance->initConnection();
		}
		
		return self::$_instance;
	}
	
	public function initConnection()
	{
		$this->db = new SafeMySQL([
			'user' => $user,
			'pass' => $pass,
			'db' => $database,
			'charset' => $charset
		]);
	}
	
	public function getConnection()
	{
		return $this->db;
	}
}
?>