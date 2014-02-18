<?php
//16/02/2014
//Siddhartha C
/*script is used to logout a user*/
//will need modification and advanced detection systems 
session_start();
if(isset($_SESSION['user']))
{	

	$_SESSION['user']=NULL;
	session_destroy();
	
}

header('location:/project/index.php');
?>
