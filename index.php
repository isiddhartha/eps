<?php
include 'root.php';
/*using relative path*/
require_once($ROOT.'lib/lib_com.php');
$db = new db;
$auth=0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
	<title>EPSELON|Home</title>
	<link rel="shortcut icon" href="img/icon.png"/>
	<link rel="stylesheet" href="style/front.css" type="text/css" media="screen" charset="utf-8"/>
	<script type="text/javascript"  src="scripts/jQuery.js"></script>
	<script type="text/javascript"  src="scripts/front.js"></script>
</head>

<body>
<div id="wrapper">
	<div class="box">
		<div class="cont">
			<div id="feedback">
<?php
if (isset($_POST['usr']) && isset($_POST['pass']))
{ 

	if($db)
	{
		$query="select * from user where username='".$_POST['usr']."' and password= password('".$_POST['pass']."')";
		$result=mysql_query($query);
		
		if(mysql_num_rows($result)>0)
		{
		session_start();
		$_SESSION['logged']=1;
		header("location:project/index.php?sort=normal");
		}
		else
		{
		echo 'Your username/password pair is incorrect. Please check and try again!';
		unset($_POST['usr']);
		}
	}
	else 
	{
	$error=new errormod(1);
	}
	unset($_POST['usr']);
}


?>
			
			</div>
			<form action="/index.php" method="post">
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
	<div class="explore"><a href="project/">EXPLORE</a></div>
</div>
</body>

</html>

