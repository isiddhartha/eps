<?php
//16/02/2014
//Siddhartha C
/*script is used to logout a user*/
//will need modification and advanced detection systems 
session_start();
if(isset($_SESSION['name']))
{	

//	$_SESSION['']=NULL;
	session_destroy();
	
}

header('location:/explore.php');
?>
