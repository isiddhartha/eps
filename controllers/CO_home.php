<?php
/*
SCRIPT NAME		:	CO_home.php
AUTHOR			:	Siddhartha Chandrasekar
CREATED			:	09/09/2014
LOCATION		:	controllers/
DESCRIPTION		:	This is the controller script for the home page of the site.
					TO BE EDITED
*/
//class CO_clasname extends eps_base
class CO_home extends eps_base
{
	//declare status variable optional to hold status of controller object
	public $status;
	
	//assign property to hold model and view objects local to the controller class
	private $curModel;
	private $curView;
	
	public function __construct($routerArray)
	{
		//call the initializeComponent method to obtain access to core components
		parent::initializeComponent(); 
		//assign routerArray if received
		$this->routerArray = $routerArray;
		//assign model and view object variable after loading them using loader component
		//ex : $this->currentModel = $this->loader->loadModel('modelName');
		$this->curModel = $this->loader->loadModel('home');
		//ex : $this->currentView = $this->loader->loadModel('viewName');
		$this->curView = $this->loader->loadView('home');
		//set status as TRUE to indicate controller is functional (optional)
		$this->status = TRUE;
		
		//call all methods that need to start functioning by default
		$this->controllerProcess();
	}
	
	private function controllerProcess()
	{
		$userData = $this->routerArray;
		if(sizeof($userData) == 1)
		{
			$this->curModel->populate();
			$this->loadScripts();
			$this->loadStylesheets();
			$this->createHeader();
			$this->htmlHeader();
			$this->pageBody();
			$this->htmlFooter();
			$this->display();
		}
		else
		{
			$this->curModel->populate($userData);
			$this->loadScripts();
			$this->loadStylesheets();
			$this->createHeader();
			$this->htmlHeader();
			$this->pageBody();
			$this->htmlFooter();
			$this->display();
		}
	}
	//loads the javascripts for the particular page
	private function loadScripts()
	{
	//load jQuery by default unless minimal javascript is used in the page
	//
	}
	//loads stylesheets for the particular page
	private function loadStylesheets()
	{
	//load basic stylesheet
	//
	}
}
?>