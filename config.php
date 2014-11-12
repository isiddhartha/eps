<?php
/*function returns the root of the server. It is called by all scripts which need to know the server root.*/
class config
{
	var $ROOT;
	function __construct()
	{
	//Testing server -- deactivate this when using in a hosted server, and activate while testing as localhost
	//	$ROOT = $_SERVER['DOCUMENT_ROOT'];

	//Production Server -- activate this when in a hosted server, and deactivate while testing as localhost
	//update 1	-->	works with localhost as well
		$this->ROOT=str_replace('config.php',"",__FILE__).'/';
	}
}
?>