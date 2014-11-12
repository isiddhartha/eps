<?php

class errormod
{	
	public $code;
	public $msg;
	public $arg;
	private $style = array();
	private $script = array();
	
	function __construct($errcode=100, $reference, $module,$msg)
	{
		$this->code = $errcode;
		$this->error_log($errcode, $reference, $module);
		$this->error_msg($errcode, $msg);
		$this->error_action($errcode);
	}
	
	public function error_msg($error, $msg)
	{
		switch ($error)
		{
			case 1:
			case 'db_connect':
				$this->msg = 'OOPS! We could not connect to the database. There might be a network issue, please try again later.</br>
						If the problem persists, please drop us a message with the details of your location and error code.';
				break;
			
			case 2:
				$this->msg = 'SORRY! This location does not exist. Please check the url and try again.';
				break;
		
			case 55:
				$this->msg = $msg;
				break;
				
			case 99:
				$this->msg = 'Uh Oh! Looks like your trying to access an area which you are not permitted to view.</br>
						This project is probably private.';
				break;
			
			case 100:
				$this->msg = "Fatal Error...Looks like a internal server error..please try again later. We regret the inconvinience";
				break;
			
			default:
				$this->msg = 'Wonder what this is????o_O';
			break;
		}
		return $this->msg;
	}

		
	//method which logs the details into error.log file
	private function error_log($code, $reference, $module)
	{
		$rootobj = new config();
		$ROOT = $rootobj->ROOT;
		if (isset($ROOT))
		{
			$fp = fopen($ROOT.'logs/error.log', 'a+');
			$timeZone = new DateTimeZone("Asia/Kolkata");
			$time = new DateTime();
			$time->setTimeZone($timeZone);
			$time = $time->format("Y-m-d H:i:s");
			$str = $time.'->'.$reference.' : '.$module."\n";
			fwrite($fp,$str);			
		}
		else
		{
			echo "FATAL ERROR".$ROOT;
		}
	}
	
	private function error_action($code)
	{
		switch($code)
		{
			case 1:
				exit;
				break;
			case 2:
				header("Location:http://error.php");
				break;
			default:
				echo "Yet to be done";
				break;
		}
	}
}


?>