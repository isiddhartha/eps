

<?php

/*Function to create the side menu based on arguments received from calling function*/
function display_sidemenu($event,$msg)
{
	echo '<div id="side_menu">';
	switch ($event)
	{
	case 'list':
	echo '	<ul id="sort">
			<li><a href="project_list.php?sort=latest">Latest</a></li>
			<li><a href="project_list.php?sort=popular">Popular</a></li>
			<li><a href="project_list.php?sort=rated">Most Rated</a></li>
			<li><a href="project_list.php?sort=active">Most Active</a></li>
			</ul>';
	break;
	default:
	echo "Nothing";
	}
	echo '</div>';
}
?>


