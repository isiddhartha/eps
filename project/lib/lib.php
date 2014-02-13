<?php
/*This script serves as the collection of all common and important scripts used by all sub-modules in the project module. 
Individually used scripts are called by the respective sub-module script*/
//$ROOT=$_SERVER['DOCUMENT_ROOT'];
//$ROOT=dirname(__FILE__);
require_once($ROOT.'lib/lib_com.php'); //connects to the commom library
require_once($ROOT.'project/lib/header.php');//include the header of the page
require_once($ROOT.'project/lib/footer.php');//includes the footer of the page
require_once($ROOT.'project/lib/sidemenu.php');//includes the sidemenu of the page
require_once($ROOT.'project/lib/panel.php');//includes the center panel of the page
require_once($ROOT.'project/lib/proj_page.php');//holds the basic templates and objects for the project page layout
//require_once($ROOT.'project/lib/fns_project.php');//holds the basic functions for the project module


?>