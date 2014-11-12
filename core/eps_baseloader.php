<?php
/*
SCRIPT NAME		:	baseLoader.php
AUTHOR			:	Siddhartha Chandrasekar
CREATED			:	06/09/2014
LOCATION		:	core/
DESCRIPTION		:	This script is used to load all basic classes required by the index page or 
					optionally any other calling script. It has a predefined array of classes to be 
					loaded in an array, it searches for the files, loads them, and initiates the
					classes.
*/


	//loads all the modules specified in the basemods array
	function loadbaseclass()
	{
		global $corePath;
		global $basemods;
		global $EXT; 
		
		if(is_dir($corePath))
		{
			foreach($basemods as $mod)
			{
				include_once($corePath.$mod.$EXT);
				$temp = $mod;
				
				global $$temp;
							
				if(class_exists($mod))
				{
					$$temp = new $mod();
				}
				else
				{
					$eps_error->error(1001);
				}
			}
		}
		else
		{
			$eps_error->error(1002);
		}
		
	}
	
	

?>