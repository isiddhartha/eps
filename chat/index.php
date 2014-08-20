<?php
	require_once ('../config.php');
	$rootobj = new config();
	$ROOT = $rootobj->ROOT;
	include_once ($ROOT.'project/lib/lib.php');
	include_once($ROOT.'lib/lib_com.php');
	include_once($ROOT.'lib/header.php');
	include_once($ROOT.'lib/footer.php');
	session_start();
	$header = new header();
	$sessioncntrl= new sessionControl();
	$header->displayHeader();
	if(!isset($_SESSION['logged']) || $_SESSION['logged']!=1)
	{
		if(isset($_POST['usr']))
		{
			$sessioncntrl->login($_POST['usr'],$_POST['pass'],'default');
		}
	}
	
	$footer = new footer();
	$footer->displayFooter();
	
?>