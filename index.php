<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>

<?php
	//loads config file
	require_once ('config.php');
	$rootobj = new config();
	$ROOT = $rootobj->ROOT;
?>


	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="keywords" content="project colloboration, project management, epselon, project host, event colloboration, event management "/>
	<meta name="description" content="Epselon is an online colloboration and project management application, which allows people around the world to host projects or events and to colloborate with each other.
	People use it to stay on top of their work, and to promote a higher level of seamless teamwork and wider exposure to their work."/>
	<title>EPSELON|Home</title>
	<link rel="shortcut icon" href="img/icon.png"/>
	<link rel="stylesheet" href="/style/front.css" type="text/css" media="screen" charset="utf-8"/>
	<script type="text/javascript"  src="/scripts/jQuery.js"></script>
	<script type="text/javascript"  src="/scripts/front.js"></script>
</head>

<body>
	<div id="wrapper">
		<div class="head">
		<img src="/img/logo.png" alt = "epselon"/>
		</div>
		<div class="cont">
			<div class="box">
				<div class="box_in">
					<div class="feed">
					<?php
					session_start();
					if(isset($_SESSION['error']))
					{
						if ($_SESSION['error']==1)
						{
							echo 'Username/Password Incorrect';
						}
					session_destroy();
					}
					
					?>
					</div>
					<form action="/lib/login.php" method="post">
					Username</br>
					<input name="usr" type="text"/></br>
					Password</br>
					<input  name="pass" type="password"/></br>
					<input class="big" value="Login" type="submit"/>
					</form>
					</br>
					<a href="forgot.php">Forgot Username/Password</a></br>
					Would You like to join us?<a href="register.php">Register</a>
				</div>
			</div>
			<div class="explore"><a href="explore.php">EXPLORE</a></div>
		</div>
	</div>
</body>

</html>

