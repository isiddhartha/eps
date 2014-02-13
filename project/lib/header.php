<?php
/* Header.php--called by all project pages.Links the header of the page. Structures the header based on session data and conitional data.*/

	function display_header($header,$arg_msg) //Function to display banner. It can take parameters from the calling function to set up the banner.
	{	
		echo '<div class="header">
			 <div id="logo"><a href="	project/index.php?sort=normal"><img src="/img/logo.png"/></a></div>
			 <div class="sub1">';
		if ($header=='list')
		{
			include("list_banner.php");
		}
		else if ($header=='profile') 
		{	
			if($arg_msg)
			{
				echo '<h1>'.$arg_msg[1].'</h1></br>';
				echo '<table>';
				echo '<tr><td width="40%">Admin:    '.$arg_msg[2].'</td>';
				echo '<td width="40%">Commenced:    '.$arg_msg[3].'</td>';
				echo '<td>Category:    '.$arg_msg[4].'</td></tr>';
				echo '</table>';
				echo '<p left="100px">Tags:  '.$arg_msg[5].'</p>';
			}
		}
		/*extendable for other modules of the projects module*/
		echo '</div></div>';
	}


?>