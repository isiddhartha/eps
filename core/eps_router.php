<?php
/*
SCRIPT NAME		:	baseLoader.php
AUTHOR			:	Siddhartha Chandrasekar
CREATED			:	06/09/2014
LOCATION		:	core/
DESCRIPTION		:	The script takes the PHP_INFO elements from the server global variable and 	
					parses it to determine the controller or page to be loaded for the user. This in
					turn loads the models and views, styles and javascripts used by the requested 
					resource
*/


class eps_router extends eps_base
{
	public $status;
	
/*	protected $loader;
	protected $db;
	protected $sessionControl;
	protected $error;
*/	
	protected $routerArray; //holds the list of data to be used by router and loader
/*	protected $controllersPath; //h
	protected $modelsPath;
	protected $viewsPath;
	protected $EXT;
*/	
/*------------------------------------------------------------------------------------------------*/
	
/*
makes all controller, model and views path global to make them accessible throught the class. Make 
the EXT variable global. Sets the status property to TRUE to indicate the router is functioning.
*/
	public function __construct()
	{
	/*	global $viewsPath;
		global $controllersPath;
		global $modelsPath;
		global $EXT;
		global $eps_error;
		global $eps_loader;
		global $eps_db;
		global $eps_sessionControl;
	*/	
		parent::initializeCore();
		$this->routerArray=array();	
				
	/*	$this->controllersPath=$controllersPath;
		$this->modelsPath = $modelsPath;
		$this->viewsPath = $viewsPath;
		$this->EXT = $EXT;
		
		$this->error = $eps_error;
		$this->db = $eps_db;
		$this->sessionControl = $eps_sessionControl;
	//	$this->loader = $eps_loader; //cannot be assinged here since the object has not been made yt
	*/	
		$this->status = TRUE;
	}

/*------------------------------------------------------------------------------------------------*/

	public function determine()
	{
		global $eps_loader;
		
		$i=0;
		$temp = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:NULL;
		$divs = array();
		$divs = explode('/',$temp);
		if(sizeof($divs)>1)
		{
			foreach($divs as $val)
			{	
				if($val)
				{
					$this->routerArray[$i] = $val;
					$i++;
				}
			}
		}
		else
		{
			$this->routerArray[0] = 'home'; 
		}
		
		$this->loader = $eps_loader;
		
		$this->loader->putRouterArray($this->routerArray);
	}
/*------------------------------------------------------------------------------------------------*/
/*
Method to be called by the main script to load the main controller specific to the requested page,
and pass the arguments that came with it.
*/
//dummy function not used
	public function loadControllerabc()
	{
		if($this->route[0] != 'home')
		{
			$controller = $this->controllers.$this->controllerPrefix.$this->route[0].$this->EXT;
		}
		else
		{
			$controller = $this->controllers.$this->controllerPrefix.$this->route[0].$this->EXT;
		}
		
		if(file_exists($controller))
		{
			include_once($controller);
		}
		else
		{
			$this->error->error(1601);
		}
		
	}
/*------------------------------------------------------------------------------------------------*/
	
	
}
?>
