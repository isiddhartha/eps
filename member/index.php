<?php
/*MEMBERS HOME PAGE--this structures the basic page seen by a member once he is logged in.*/
require_once($_SERVER['DOCUMENT_ROOT'].'/common/errormod.php');
if(!isset($_SESSION['uid'])
{
echo '<div class="error">Please log in and try again!</div>';
}
?>