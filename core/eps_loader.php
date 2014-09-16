<?php
/*
SCRIPT NAME		:	eps_loader.php
AUTHOR			:	Siddhartha Chandrasekar
CREATED			:	08/09/2014
LOCATION		:	core/
DESCRIPTION		:	This script holds functions used to load controllers, models and views specific
					to a requested URL. The functions can be called from anywhere, mainly invoked 
					from the eps_router class.
*/

class eps_loader extends eps_base
{
	public $status;
	
	
	private $curController;
	private $curModel;
//	private $curView;
	
/*	private $controllerName;
	private $modelName;
	private $viewName;
	
	protected $loader;
	protected $db;
	protected $sessionControl;
	protected $error;
	
	protected $routerArray; //holds the list of data to be used by router and loader
	protected $controllersPath; //h
	protected $modelsPath;
	protected $viewsPath;
	protected $EXT;*/
/*------------------------------------------------------------------------------------------------*/
/*
Performs all operations when loader class is instantiated for the first time
*/

	public function __construct()
	{	
		parent::initializeCore();
	/*	global $viewsPath;
		global $controllersPath;
		global $modelsPath;
		global $EXT;
		global $eps_error;
		global $eps_loader;
		global $eps_db;
		global $eps_sessionControl;
		
		
		$this->controllersPath=$controllersPath;
		$this->modelsPath = $modelsPath;
		$this->viewsPath = $viewsPath;
		$this->EXT = $EXT;
		
		$this->error = $eps_error;
		$this->db = $eps_db;
		$this->sessionControl = $eps_sessionControl;*/
		
		
		$this->status = TRUE;
	}
/*------------------------------------------------------------------------------------------------*/
	public function putRouterArray($routerArray)
	{
		$this->routerArray = $routerArray;
	}

/*------------------------------------------------------------------------------------------------*/	
/*
Method will be invoked by the super script to load a controller and return the object to it.
*/
	public function & loadController()
	{	
		if(! $this->curController)
		{
			if($this->routerArray[0] != NULL)
			{
				$this->controllerName = $this->controllerPrefix.$this->routerArray[0];
				if(is_dir($this->controllersPath))
				{
					$controller = $this->controllersPath.$this->controllerName.$this->EXT;
					include_once($controller);
					if(class_exists($this->controllerName))
					{
						$this->curController = new $this->controllerName($this->routerArray);
						return $this->curController;
					}
					else
					{
						$this->error->error(1001);
					}
				}
				else
				{
					$this->error->error(1002);
				}
			}
			else
			{
				$this->error->error(400);
			}
		}
		else
		{	
			return $this->curController;
		}
	}


	public function & loadModel($modelName)
	{
		if(! $this->curModel)
		{
			if($modelName)
			{
				$this->modelName = $this->modelPrefix.$modelName;
				if(is_dir($this->modelsPath))
				{
					$model = $this->modelsPath.$this->modelName.$this->EXT;
					include_once($model);
					if(class_exists($this->modelName))
					{
						$this->curModel = new $this->modelName();
						return $this->curModel;
					}
					else
					{
						$this->error->error(1001);
					}
				}
				else
				{
					$this->error->error(1002);
				}
			}
			else
			{
				$this->error->error(400);
			}
		}
		else
		{
			return $this->curModel;
		}
	}

	public function loadView($viewName,$argv)
	{
		if($viewName)
		{
			if(is_dir($this->viewsPath))
			{
				$view = $this->viewsPath.$this->viewPrefix.$viewName.$this->EXT;
				
				if(file_exists($view))
				{
					if(is_array($argv))
					{
						foreach($argv as $key=>$value)
						{
							$$key = $value;
						}
					}
					else
					{
						$default = $argv;
					}
					ob_start();
					include($view);
					ob_end_flush();
				}
				else
				{
					$this->error->error(1003);
				}
			}
			else
			{
				$this->error->error(1002);
			}
		}
		else
		{
			$this->error->error(400);
		}
		
	}

	public function loadLibraryClass()
	{
	}
	
	public function loadScripts($scriptName)
	{
		if($scriptName)
		{
			if(is_dir($this->scriptsPath))
			{
				$script = $this->scriptsPath.$scriptName;
				//file read functions to be called and obtain content of view file as a string
				if(file_exists($script))
				{
					$string = '<script type="text/javascript"  src="'.$script.'"></script>';
					return $string;
				}
				else
				{
					$this->error->error(1003);
				}
			}
			else
			{
				$this->error->error(1002);
			}
		}
		else
		{
			$this->error->error(400);
		}
	}
	
	public function loadStylesheets($styleName, $media = 'screen')
	{
		if($styleName)
		{
			if(is_dir($this->stylesPath))
			{
				$style = $this->stylesPath.$styleName;
				//file read functions to be called and obtain content of view file as a string
				if(file_exists($style))
				{
					$string = '<link rel="stylesheet" href="'.$style.
								'" type="text/css" media="'.$media.'" charset="utf-8"/>';
					return $string;
				}
				else
				{
					$this->error->error(1003);
				}
			}
			else
			{
				$this->error->error(1002);
			}
		}
		else
		{
			$this->error->error(400);
		}
	}
	
}

?>