<?php
/*
SCRIPT NAME		:	eps_base.php
AUTHOR			:	Siddhartha Chandrasekar
CREATED			:	09/09/2014
LOCATION		:	core/
DESCRIPTION		:	Abstract class to be used as parent class for all core classes and controllers, 
					models and views.
*/

abstract class eps_base
{
	public $status;
	
	protected $controllersPath;
	protected $modelsPath;
	protected $viewsPath;
	protected $scriptsPath;
	protected $stylesPath;
	protected $EXT;
	protected $controllerPrefix;
	protected $modelPrefix;
	protected $viewPrefix;
	
	protected $error;
	protected $db;
	protected $sessionControl;
	protected $router;
	protected $loader;
	
	protected $routerArray;

/*------------------------------------------------------------------------------------------------*/
/*
This method is used to configure the core class objects. They will be a derived class of this class.
The essential objects will be checked if they are available and assinged to the new object.
*/
	protected function initializeCore()
	{
		global $eps_error;
		global $eps_loader;
		global $eps_db;
		global $eps_router;
		global $eps_sessionControl;
		
		global $controllersPath;
		global $modelsPath;
		global $viewsPath;
		global $scriptsPath;
		global $stylesPath;
		global $EXT;
		global $controllerPrefix;
		global $modelPrefix;
		global $viewPrefix;
		
		
		$className = get_class($this);
		
		$this->controllersPath = $controllersPath;
		$this->modelsPath = $modelsPath;
		$this->viewsPath = $viewsPath;
		$this->scriptsPath = $scriptsPath;
		$this->stylesPath = $stylesPath;
		$this->EXT = $EXT;
		$this->controllerPrefix = $controllerPrefix;
		$this->modelPrefix = $modelPrefix;
		$this->viewPrefix = $viewPrefix;
		
		if($className == 'eps_db')
		{
			$this->error = $eps_error;
		}
		elseif ($className == 'eps_sessionControl')
		{
			$this->error = $eps_error;
			$this->db = $eps_db;
		}
		elseif ($className == 'eps_router')
		{
			$this->error = $eps_error;
			$this->db = $eps_db;
			$this->sessionControl = $eps_sessionControl;
		}
		elseif ($className == 'eps_loader')
		{
			$this->error = $eps_error;
			$this->db = $eps_db;
			$this->sessionControl = $eps_sessionControl;
			$this->router = $eps_router;
		}
		
	}
	
	protected function initializeComponent()
	{
		global $eps_error;
		global $eps_loader;
		global $eps_db;
		global $eps_router;
		global $eps_sessionControl;
		
		global $controllersPath;
		global $modelsPath;
		global $viewsPath;
		global $scriptsPath;
		global $stylesPath;
		global $EXT;
		
		global $controllerPrefix;
		global $modelPrefix;
		global $viewPrefix;
		
		$className = get_class($this);
		
		$this->controllersPath = $controllersPath;
		$this->modelsPath = $modelsPath;
		$this->viewsPath = $viewsPath;
		$this->scriptsPath = $scriptsPath;
		$this->stylesPath = $stylesPath;
		$this->EXT = $EXT;
		$this->controllerPrefix = $controllerPrefix;
		$this->modelPrefix = $modelPrefix;
		$this->viewPrefix = $viewPrefix;
		
		
		
		if(strstr($className,$this->controllerPrefix))
		{
			$this->error = $eps_error;
			$this->db = $eps_db;
			$this->sessionControl = $eps_sessionControl;
			$this->loader = $eps_loader;
			
		}
		elseif(strstr($className, $this->modelPrefix))
		{
		}
		elseif(strstr($className, $this->viewPrefix))
		{
		}
	}
	
	
	
}

?>