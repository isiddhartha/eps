<?php
/*LOGOUT script--used by all pages as a included function to logout and view the front page*/

if(isset($_SESSION['logged']))
{session_destroy();
header('location:project/project_list.php');
}
else
{echo 'You are already logged out';
}
?>
