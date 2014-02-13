<?php
/*panel.php--holds function to display panel*/
/*Function that is configures the panel division of the page based on the contents it is showing.
Module variable contains the specification of the module of project box that needs to displayed. Bye default the list of projects are displayed.*/
	function display_panel($event,$msg)
	{
		echo '<div class="cont">';
		echo '<div id="panel">';
		switch ($event)
		{
			case 'profile':
			view_project($msg);
			break;
			case 'list':
			$list=new proj_list($msg);
			$list->grid();
			break;
			case 'error':
			error_project($msg);
			break;
		}
		echo '</div>';
		echo '</div>';
	}
?>