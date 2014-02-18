	<?php
/*Class used to connect to database and hold the link as a resource for use by depending objects and function*/
//	define('USER','a4833237_pole');	//uncomment when used in webhost
	define('USER','a8021345_pole');
	define('HOST','localhost');
//	define('HOST','mysql2.000webhost.com');	//uncomment when used in webhost
	define('PASSWORD','comport123');
	define('DB','pole');
//	define('DB','a4833237_pole');	//uncomment when used in webhost

function get_db()
{
	$db=new mysqli(HOST,USER,PASSWORD,DB) or die($error=new errormod(1)) ;
			if ($db->connect_errno)
			{	
				$error = new errormod(1);
				exit();
			}
			else
			return $db;
}
?>