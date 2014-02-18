<?php
/* Header.php--called by all project pages.Links the header of the page. Structures the header based on session data and conitional data.*/

	function display_header() //Function to display banner. It can take parameters from the calling function to set up the banner.
	{	
		echo '<div class="header">
			 <link rel="stylesheet" href="/project/style/header.css" type="text/css" media="screen" charset="utf-8"/>
			 <div id="logo"><a href="/project/index.php?sort=normal">epselon</a></div>';
		
		
		echo '<div class="log">';
			if(isset($_SESSION['user']))
			{
				echo '<a class = "greet" href="#">'.$_SESSION['user'].'</a><a href="/lib/logout.php">logout</a>';
			}
			else
			{
				echo '<form action="/lib/login.php" method="post">
						<input type="text" name="usr" placeholder="USERNAME"/>
						<input type="password" name="pass" placeholder="PASSWORD"/>
						<input type="submit" class="small_but" value ="Login"/>
						</form>';
			}
		echo '</div>';
		echo '</div>';
		
	}


?>