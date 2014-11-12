<?php
	//load config file
	require_once ('config.php');
	$rootobj = new config();
	$ROOT = $rootobj->ROOT;
	
	//load error handling object
	//load dependencies<--
	include_once ($ROOT.'project/lib/lib.php'); //call to the lib.php file to include all dependencies for this page
	
	//include session authentication object<--
	session_start();
	
	//authenticate session and set permission levels
	
	
	//include project URL rewiting object
	
	
	//determine project Id and/or title
	
	//include project object and related objects
	include_once($ROOT.'/project/projectObj.php');
	
	//initialize project object by passing id and/or name
	$val = $_GET['proj_id'];
	$config = 1;
	
	//include project sub-modules depending on standard tools and user preferences
	
	
	
	//create page template
	if ($config == true)
	{
	echo '<html xmlns="http://www.w3.org/1999/xhtml"> 
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<meta name="keywords" content="project colloboration, project management, epselon, project host, event colloboration, event management "/>
			<meta name="description" content="Epselon is an online colloboration and project management application, which allows people around the world to host projects or events and to colloborate with each other.
			People use it to stay on top of their work, and to promote a higher level of seamless teamwork and wider exposure to their work."/>
			<title>EPSELON</title>
			<link rel="shortcut icon" href="img/icon.png"/>
			<link rel="stylesheet" href="/project/style/explore.css" type="text/css" media="screen" charset="utf-8"/>
			<link rel="stylesheet" href="/project/style/grid.css" type="text/css" media="screen" charset="utf-8" />
			<script type="text/javascript"  src="/scripts/jQuery.js"></script>
			<script type="text/javascript"  src="/project/scripts/explore.js"></script>
		</head>

		<body>
		<div class="wrapper">';
		$header = new header();
		$header->displayHeader();
		echo '<div class="cont">';
		$samp = new projectObj($val);
		echo '</div>';
		$footer = new footer();
		$footer->displayFooter();
		echo '</div></body></html>';
		}
		else
		$error = new errormod(2);
	
	//display header
	
	//display view based on sub-module requested through url
	
	//display navigation
	
	//display miscelleneous objects
	
	//diaplay footer
	
	
?>