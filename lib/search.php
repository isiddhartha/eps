<?php
//16/02/2014
//Siddhartha C
//Script used to perform search functionality. it is inluced as a php script, by default it displays search field.
//-->may be integrated with search wuery functionality

if (isset($_GET['query']))
{
	echo 'Your search was '.$_GET['query'];
	
}


function displaySearch()
{
	echo'<link rel ="stylesheet" type="text/css" href ="/style/search.css" charset="utf-8"/>
		<div class="search">
		<form method="get" action="/lib/search.php">
		<input type="text" name="query" placeholder="Projects, People, Pages">
		<input type="submit" class="small_but" value="search">
		</form>
		</div>';
}
?>