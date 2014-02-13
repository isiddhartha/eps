	<?php
/*Class used to connect to database and hold the link as a resource for use by depending objects and function*/
$ROOT=$_SERVER['DOCUMENT_ROOT'];


class db
{
	var $db;
	function db()
	{
		@$this->db=mysql_pconnect('localhost','a8021345_pole','comport123');
		if (!isset($this->db))
		{	
			$error = new errormod(1);
			exit;
		}
		else
		{   
			mysql_select_db('pole');
		}
	}
}
?>