<?php
/* post the username and password to this script and it will authenticate the user*/
if (!isset($ROOT))
{
	require_once ('../config.php');
	$rootobj = new config();
	$ROOT = $rootobj->ROOT;
}

include_once($ROOT.'lib/lib_com.php');

$db = new db();
$db = $db->getDb();

if (isset($_POST['usr']) && isset($_POST['pass']) &&isset($db))
	{ 

		if($db)
		{
			$query="select * from user where username='".$_POST['usr']."' and password= password('".$_POST['pass']."')";
			$result=$db->query($query);
			
			if($result->num_rows>0)
			{
			session_start();
			$row=$result->fetch_array();
			$_SESSION['logged']=1;
			$_SESSION['user']=$row['username'];
			$_SESSION['error']=NULL;
			header('location:/explore.php');
			}
			else
			{
			session_start();
			$_SESSION['error']=1;
			header('location:/index.php');
			}
		}
		else 
		{
		$error=new errormod(1);
		}
	}
?>