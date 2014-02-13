<?php

/*The primary display function which in return calls many sub-functions, passing arguments to invoke the appropriate pattern for the view.*/
function display($title,$event,$msg,$ban=0)
{
	initialize($title);
	echo '<body>';
	echo '<div id="head">';
	echo '<div id="logo">logo</div>';
	display_banner($ban,$msg); //display_basic _page
	echo '</div>';
	echo '<div id="low">';
	display_sidemenu();
	display_panel($event,$msg);
	echo '</div>';
	display_footer();//display_basic _page
	echo '</body>';
	echo '</html>';
}

/*Function to create the side menu based on arguments received from calling function*/
function display_sidemenu()
{
	echo '<div id="side_menu">';
	echo 'side menu';
	echo '</div>';
}

/*Function that is configures the panel division of the page based on the contents it is showing.
Module variable contains the specification of the module of project box that needs to displayed. Bye default the list of projects are displayed.*/
function display_panel($event,$msg)
{
	echo '<div id="panel">';
	switch ($event)
	{
		case 'profile':
		view_project($msg);
		break;
		case 'list':
		list_project();
		break;
		case 'error':
		error_project($msg);
		break;
	}
	echo '</div>';
}


/*A function which retreives all the projects from the database and lists them on the panel*/
function list_project()
{
$db=db_connect();
$query="select * from project";
$result=mysql_query($query);
	if($result)
	{
	echo '<table style=" width:850px;">';
		for($i=0;$i<mysql_num_rows($result);$i++)
		{	
			$row=mysql_fetch_array($result);
			echo '<tr style ="border:2px solid black;">';
			echo '<td width="400px"><a href="project.php?proj_id='.$row['proj_id'].'&edit=0">'.$row['title'].'</a></td>';
			echo '<td width="100px">'.$row['admin'].'</td>';
			echo '<td width="100px">'.$row['doc'].'</td>';
			echo '<td width="100px">'.$row['type'].'</td>';
			echo '</tr>';
		}
	echo '</table>';
	}
	else
	error_project('No Projects Found');
}

/*The function which works as a centralized point where all errors are dumped and handled.*/
function error_project($msg)
{
	echo $msg;
	exit;
}

/*This function receives the project id from the display function, accesses the description from the database and displays it at the panel*/
function view_project($msg)
{
	/*The connection to database has already been made in the view_project page, so re initialization is not required.*/
	$proj_id=$msg[0];
	$query='select * from proj_prof where proj_id='.$proj_id;
	$result=mysql_query($query);
	if(!$result)
	{
		error_project('The Project profile could not be accessed.');
	}
	else
	{
		if(mysql_num_rows($result)==1)
		{
				$row=mysql_fetch_array($result);
				$descr=$row['descr'];
				echo $descr;
				echo '<a class="icons" href="project.php?edit=1&proj_id='.$proj_id.'"><img src=""/alr="edit"/></a>';
		}
		else
		error_project('Not Accessible');
	}
}
?>