<?php
//16/02/2014
//Siddhartha C
//Script used to perform search functionality. it is inluced as a php script, by default it displays search field.
//-->may be integrated with search wuery functionality

if (isset($_GET['query']))
{
echo 'Your search was '.$_GET['query'];
}


function display_search()
{
	echo'<style type="text/css">
		.search{position:relative; float:right; width:300px; height:100%; padding-right:10px; text-align:right;}
			.search form{height:90%; width:100%;}
			.search input{width:225px; height:25px; border-radius:3px; border:none; border: 1px solid #04945F;}
			.search .small_but{width:60px; height:30px; background:#04A45F; color:#FFF; border:1px solid #04945F; cursor:pointer;}
			.search .small_but:hover{background:#04B45F;}
		</style>
		<div class="search">
		<form method="get" action="/lib/search.php">
		<input type="text" name="query" placeholder="Projects, People, Pages">
		<input type="submit" class="small_but" value="search">
		</form>
		</div>';
}
?>