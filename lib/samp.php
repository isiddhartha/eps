<?php
$var1=$_SERVER['DOCUMENT_ROOT'];
echo $var1.'</br>';
$var2= dirname(__FILE__);
echo $var2.'</br>';
require_once($var2."\samp2.php");
?>