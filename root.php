<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];
echo $ROOT.'<br/>';
$ROOT = __DIR__;
echo $ROOT.'<br/>';
$val = $SERVER['SCRIPT_NAME'];
echo $val;
?>