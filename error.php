<html>
<?php
	require_once ('config.php');
	$rootobj = new config();
	$ROOT = $rootobj->ROOT;
	include_once ($ROOT.'/lib/errormod.php'); //call to the lib.php file to include all dependencies for this page
	include_once ($ROOT.'/lib/header.php'); //call to the lib.php file to include all dependencies for this page
	include_once ($ROOT.'/lib/footer.php'); //call to the lib.php file to include all dependencies for this page
	session_start();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />  
<link rel="stylesheet" href="../style/error.css" type="text/css" media="screen" charset="utf-8" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="../script/error.js"></script>
<title>EPSELON|error</title>

</head>

<body>
<div class="wrapper">
<?php
	$header = new header();
	$header->displayHeader();
?>
<div class="msg">
<p>
<?php
$error =  $_GET['errorcode'];
$newError = new errormod();
$errorString = $newError->error_msg($error);
echo $errorString;
?>
</p>
<div class="back">BACK</div>
</div>

<?php
	$footer = new footer;
	$footer->displayFooter();
?>
</div>
</body>
</html>