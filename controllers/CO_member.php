<?php
/*
SCRIPT NAME		:	CO_member.php
AUTHOR			:	Siddhartha Chandrasekar
CREATED			:	22/09/2014
LOCATION		:	controllers/
DESCRIPTION		:	This is the controller script for the member page of the site.
					TO BE EDITED
*/
//class CO_clasname extends eps_base
class CO_member extends eps_base
{
	//declare status variable optional to hold status of controller object
	public $status;
	
	//assign property to hold model object local to the controller class
	private $curModel;
	
	private $scripts;
	private $stylesheets;
	private $httpHeader;
	private $htmlHeader;
	private $htmlFooter;
	private $pageBody;
	
	public function __construct($routerArray)
	{
		//call the initializeComponent method to obtain access to core components
		parent::initializeComponent(); 
		
		//assign routerArray if received
		$this->routerArray = $routerArray;
		
		//assign model and view object variable after loading them using loader component
		//ex : $this->currentModel = $this->loader->loadModel('modelName');
		$this->curModel = $this->loader->loadModel('home');
				
		//set status as TRUE to indicate controller is functional (optional)
		$this->status = TRUE;
		$this->controllerProcess();
		
		//call all methods that need to start functioning by default
	;
	}
	
	private function controllerProcess()
	{
		$userData = $this->routerArray;
		$out =NULL;
		if(sizeof($userData) == 1)
		{
			if(isset($_SESSION['error']))
			{
				if ($_SESSION['error']==1)
				{
					$out =  'Username/Password Incorrect';
				}
			}
					
			$argv = array("out"=>$out);
			$this->display($argv);
			//$this->curModel->populate();
			//$this->loadScripts();
			//$this->loadStylesheets();
			//$this->createHeader();
			//$this->htmlHeader();
			//$this->pageBody();
			//$this->htmlFooter();
			//$this->display();
			
		}
		else
		{
			//$this->curModel->populate($userData);
			$this->loadScripts();
			$this->loadStylesheets();
			
		}
	}
	//loads the javascripts for the particular page
	private function loadScripts()
	{
	//load jQuery by default unless minimal javascript is used in the page
	//
		$this->scripts = NULL;
		$this->scripts .= $this->loader->loadScripts('jquery.js');
		$this->scripts .= $this->loader->loadScripts('front.js');
		return $this->scripts;
		
	}
	//loads stylesheets for the particular page
	private function loadStylesheets()
	{
	//load basic stylesheet
	//
		$this->stylesheets = NULL;
		$this->stylesheets .= $this->loader->loadStylesheets('front.css');
		return $this->stylesheets;
	}
	private function createHeader($argh)
	
	{
		$string = "<head>";
		$string .='<meta http-equiv="content-type" content = "text/html; charset = UTF-8">';
		
		foreach($argh as $key=>$value)
		{
			if($key == "title")
			{
				$string .='<title>'.$value.'</title>';
			}
			elseif($key == "meta")
			{
				if(is_array($value))
				{
					foreach($value as $name=>$content)
					{
						if($name == "refresh")
						{
							$string .='<meta http-equiv="refresh" content="'.$content.'">';
						}
						else
						{
							$string .='<meta name="'.$name.'" content ="'.$content.'">';
						}
					}
				}
			}
		}
		
		
		$string .= $this->loadStylesheets();
		$string .= $this->loadScripts();
		$string .= "</head>";
		return $string;
	}
	
	private function display($argv)
	{
		$argh = array("title"=>"EPSELON");
		$argh["meta"] = array("description"=>"Productivity and Colloboration Platform",
								"keywords"=>"colloboration, teamwork, epselon, productivity",
								"author"=>"epselon labs"
								);
		echo "<html>";
		echo $this->createHeader($argh);
		$this->loader->loadView('home',$argv);
		echo "</html>";
	}
	
	
}
?>