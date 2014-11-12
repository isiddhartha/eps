<?php
/* Header.php--called by all project pages.Links the header of the page. Structures the header based on session data and conitional data.*/

class header
{
	protected $curFile;
	public function __construct()
	{
		//check authentication
		
		//call functions to set header
		
		//hand over control to calling script
		
		$this->curFile = $_SERVER['PHP_SELF'];
	}
	
	public function displayHeader() //Function to display banner. It can take parameters from the calling function to set up the banner.
	{	
		echo '<div class="header">
			 <link rel="stylesheet" href="/styles/header.css" type="text/css" media="screen" charset="utf-8"/>
			 <div id="logo"><a href="/project/index.php?sort=normal"><img src="/img/logo.png" alt="epselon" /></a></div>';
		
		
		echo '<div class="user_int">';
			if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1)
			{
				echo '<div class="log">';
				echo '<a class = "greet" href="#">'.$_SESSION['name'].'</a><form class ="logout" action = "'.$this->curFile.'" method= "post"><input class = "small_but" type="submit" name= "logout" value="logout"/></form>';
				echo '</div>';
				echo '<div class="notifications">';
				echo '<div class ="user_but">Messages</div><div class="user_but">Alerts</div><div class="user_but">Reminders</div>';
				echo '</div>';
				
			}
			else
			{
				echo '<div class="log">';
				echo '<form action="'.$this->curFile.'" method="post">
						<input type="text" name="usr" placeholder="USERNAME"/>
						<input type="password" name="pass" placeholder="PASSWORD"/>
						<input type="submit" class="small_but" value ="Login"/>
						</form>';
				if (isset($_SESSION['error']) && $_SESSION['error']==1)
				{
					echo "Incorrect username/passwrod";
					$_SESSION['error'] = 0;
				}
				echo '</div>';
			}
		echo '</div>';
		echo '</div>';
		
	}
	
	public function setHeader($args)
	{
		
	}

}
?>