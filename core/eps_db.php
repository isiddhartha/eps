	<?php
/*Class used to connect to database and hold the link as a resource for use by depending objects and function*/
//	define('USER','a4833237_pole');	//uncomment when used in webhost
	define('USER','a8021345_pole');
	define('HOST','localhost');
//	define('HOST','mysql2.000webhost.com');	//uncomment when used in webhost
	define('PASSWORD','comport123');
	define('DB','pole');
//	define('DB','a4833237_pole');	//uncomment when used in webhost


//change db into a class<--
class eps_db extends eps_base
{
	public $resDb;
	public $status;
	
	
	function __construct()
	{
	/*	global  $eps_error;
		$this->error = $eps_error;*/
		parent::initializeCore();
		$this->connect();
		$this->status = TRUE;
	}
	
	private function connect()
	{
	@ $this->resDb = new mysqli(HOST,USER,PASSWORD,DB) or die($error=new errormod('db_connect')) ;
				if ($this->resDb->connect_errno)
				{	
					$this->error->error(1501);
					exit();
				}
				
	}
	
	public function getDb()
	{
		if(isset($this->resDb))
		{
			return $this->resDb;
		}
		else
			$this->error->error(1502);
	}
	
	public function dbDet($res)
	{
		$temp;
		
		switch($res)
		{
			case 'dbname':
				$temp = DB;
				break;
			case 'username':
				$temp = USER;
				break;
			case 'hostname':
				$temp = HOST;
				break;
		}
		return $temp;
	}
	
	public function dbClose()
	{
		$this->resDb->close();
	}
}
?>