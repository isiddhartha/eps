<?php

class errormod
{	

	var $msg;
	var $arg;
	
	
	function errormod($code)
	{
		switch ($code)
		{
			case 1:
			$this->msg = 'OOPS! We could not connect to the database. There might be a network issue, please try again later.</br>
						If the problem persists, please drop us a message with the details of your location and error code.';
			break;
			case 2:
			$this->msg = 'SORRY! This location does not exist. Please check the url and try again.';
			break;
		
			case 100:
			$this->msg = 'Uh Oh! Looks like your trying to access an area which you are not permitted to view.</br>
						This project is probably private.';
			break;
			default:
			$this->msg = 'Wonder what this is????o_O';
			break;
		}
		
		echo '	<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />  
				<link rel="stylesheet" href="../style/error.css" type="text/css" media="screen" charset="utf-8" />
				<script type="text/javascript" src="jquery.js"></script>
				<script type="text/javascript" src="../script/error.js"></srcipt>';
				
		echo '<title>ERROR!</title></head>';
		echo '<body><div id="wrapper"><div class="header"></div><div class="msg"><p>'.$this->msg.'</p></div><div class="back">BACK</div></div></body></html>';
	}
	

}


?>