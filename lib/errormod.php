<?php

class errormod
{	
	public $code;
	public $msg;
	public $arg;
	private $style = array();
	private $script = array();
	
	function __construct($errcode=NULL, $reference = "not specified", $module="not specified")
	{
		$this->code = $errcode;
		if (isset($errcode))
		{
			$this->error_log($errcode, $reference, $module);
			$this->error_out();
		}
	}
	
	public function error_msg($error)
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
		
			case 100:
			$this->msg = 'Uh Oh! Looks like your trying to access an area which you are not permitted to view.</br>
						This project is probably private.';
			break;
			
			default:
			$this->msg = 'Wonder what this is????o_O';
			break;
		}
		return $this->msg;
	}

	private function error_out()
	{
		header('location:/error.php?errorcode='.$this->code);
	}
	
	//method which logs the details into error.log file
	private function error_log($code, $reference, $module)
	{
		$rootobj = new config();
		$ROOT = $rootobj->ROOT;
		if (isset($ROOT))
		{
			$fp = fopen($ROOT.'logs/error.log', 'a+');
			$timeZone = new DateTimeZone("Asia/Colombo");
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
	
	//makes a call to all the style sheets used by error module
	private function call_style()
	{
		$style[0]="";
	}
	
	//makes a call to all javascript used by the error module
	private function call_userscript()
	{
		$script[0]="";
	
	}
		
}


?>