<?php
/*
SCRIPT NAME		:	error.php
AUTHOR			:	Siddhartha Chandrasekar
CREATED			:	07/09/2014
LOCATION		:	core/
DESCRIPTION		:	This script holds the error class. The class is responsible for holding all 
					methods and properties concerning the error at any part of the application. The 
					log_error method will be called by the function indicating an error, error_msg 
					method will determine the message
*/

class eps_error extends eps_base
{	
	public $status;
	private $code;
	private $msg;
	private $httpError;
	private $userError;
	private $techError;
	

/*------------------------------------------------------------------------------------------------*/	
	function __construct()
	{
		parent::initializeCore();
		$this->httpError = array(
									400=>"Bad Request",
									401=>"Unauthorized Page Access",
									403=>"Forbidden",
									404=>"Not Found",
									408=>"Request Time Out",
									500=>"Internal Server Error",
									522=>"Connection Time Out"
									);
		$this->userError = array(
									1001=>"Class Not Defined",
									1002=>"Path Error"
									);
		$this->techError = array(
									1501=>"Database Connection Failed",
									1502=>"Database Not available",
									1601=>"File not found"
									);
		$this->status = TRUE;
	}
/*------------------------------------------------------------------------------------------------*/	
	public function error_msg($error, $msg)
	{
		switch ($error)
		{
			case 1:
			case 'db_connect':
				$this->msg = 'OOPS! We could not connect to the database. There might be a network 
								issue, please try again later.</br>
								If the problem persists, please drop us a message with the details 
								of your location and error code.';
				break;
			
			case 2:
				$this->msg = 'SORRY! This location does not exist. Please check the url and try 
								again.';
				break;
		
			case 55:
				$this->msg = $msg;
				break;
				
			case 99:
				$this->msg = 'Uh Oh! Looks like your trying to access an area which you are not 
							permitted to view.</br>
							This project is probably private.';
				break;
			
			case 100:
				$this->msg = "Fatal Error...Looks like a internal server error..please try again 
								later. We regret the inconvinience";
				break;
			
			default:
				$this->msg = 'Wonder what this is????o_O';
			break;
		}
		return $this->msg;
	}

/*------------------------------------------------------------------------------------------------*/
	
	//method to be called by an error in any part of the application
	public function log_error($code, $reference = 'NA', $module ='NA')
	{
		$fp = fopen('logs/error.log', 'a+');
		$timeZone = new DateTimeZone("Asia/Kolkata");
		$time = new DateTime();
		$time->setTimeZone($timeZone);
		$time = $time->format("Y-m-d H:i:s");
		$str = $time.'->'.$reference.' : '.$module."\n";
		fwrite($fp,$str);			
	}
	

/*------------------------------------------------------------------------------------------------*/

	public function error($code, $reference = 'NA', $module ='NA')
	{
		if($code>=100 && $code <=999)
		{
		//VI_error should be loaded and appropriate message should be displayed with ways to solve 
		//the issue.
		//HTTP errors
			
		}
		elseif($code>=1000 && $code <=1499)
		{
		//VI_error should be loaded.
		//Usual errors such as Unauthorized access, User not authenticated and page not found errors
		//will be handled in this range
		}
		elseif($code>=1500 && $code <=1999)
		{
		//VI_error should be loaded.
		//error should be logged.
		//DB connectivity issues, query failures, connectivity isues and such technical isues should
		//be handled here
		}
		echo "ERROR code = ".$code;
	}
}


?>