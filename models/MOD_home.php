<?php
/*
SCRIPT NAME		:	MOD_home.php
AUTHOR			:	Siddhartha Chandrasekar
CREATED			:	13/09/2014
LOCATION		:	models/
DESCRIPTION		:	This is the model script for the home. It holds data to be used by controller
					TO BE EDITED
*/

class MOD_home extends eps_base
{
	//declare status variable optional to hold status of controller object
	public $status;
	
	
		
	public function __construct()
	{
		//call the initializeComponent method to obtain access to core components
		parent::initializeComponent(); 
		
		//set status as TRUE to indicate model is functional (optional)
		$this->status = TRUE;
		
		//call all methods to operate on creation, and populate default data
	}
	
	public function populate($userData = NULL)
	{
		
	}
	
}

?>
