<?php
	require_once ('../config.php');
	$rootobj = new config();
	$ROOT = $rootobj->ROOT;
	include_once ($ROOT.'project/lib/lib.php');
	include_once($ROOT.'lib/lib_com.php');
	include_once($ROOT.'lib/header.php');
	include_once($ROOT.'lib/footer.php');
		
	$sessioncntrl= new sessionControl();
	$header = new header();
	$header->displayHeader();
?>
<div id="chatbox" >
<?php
	if(!isset($_SESSION['logged']) || $_SESSION['logged']!=1)
	{
		echo "You have to login";
	}
	else
	{
		$db = new db();
		$db = $db->getDb();
		$query = "select * from current_users where status = 'avail'";
		$users = $db->query($query);
		if(!($users->num_rows > 0))
		{
			echo "no user online";
		}
		
		include ("viewChat.php");
	}
?>
</div>
<?php
	$footer = new footer();
	$footer->displayFooter();
	
?>