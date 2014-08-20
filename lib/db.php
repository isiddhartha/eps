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
class db
{
	private $resDb;
	function __construct()
	{
		$this->connect();
	}
	
	private function connect()
	{
	@ $this->resDb = new mysqli(HOST,USER,PASSWORD,DB) or die($error=new errormod('db_connect')) ;
				if ($this->resDb->connect_errno)
				{	
					$error = new errormod('db_connect');
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
		errormod('db_drop');
	}
}
?>