<?php

/****************************************************************************************************/
class proj_page 
/*Project page class structures the page of the project module. It calls every sub-object and pases arguments to it. It calls the banner class
after the initialization and display of logo. Creates the footer and menu if available.
It takes 3 parameters on initiation:
title--> Title to be displayed on the window
banner--> The module being displayed. Banner is populated in diverse ways for different modules.
arg_msg-->Holds all necessary data for the calling function to work properly. The array is populated according to the context of the called function */  
{
		
	function proj_page($title,$event,$arg_msg)/*A function to initialize the header and set the title*/
	{
		$this->initialize($title);
		echo '<body><div id="wrapper">';
		display_header($event,$arg_msg); //acesses the banner class, creates a banner object and passes the banner type and argument parameters
		display_panel($event,$arg_msg);
		display_sidemenu($event,$arg_msg);
		display_footer();//display_basic _page
		echo '</div></body>';
		echo '</html>';
	}
	
	
	function initialize($title)//function to start the generation of an html page
	{
		echo 	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />  
				<link rel="stylesheet" href="style/project.css" type="text/css" media="screen" charset="utf-8" />
				<link rel="stylesheet" href="style/grid.css" type="text/css" media="screen" charset="utf-8" />';
		echo 	'<title>'.$title.'</title></head>';
	}
}
?>
