<?php
	require_once('lib/lib.php');
	$proj_id=$_GET['proj_id'];
	$db=new db;
	if ($_GET['edit']==0)
	{
		$query='select * from project where proj_id='.$proj_id.' and visibility=\'public\'';
		$result=mysql_query($query);
		if(!$result)
		{
			$error="Project details could not retrieved because they are private.";
			display('Project can\'t be accessed','error',$error);
		}
		else
		{
			$row=mysql_fetch_array($result);
			$title=$row[1];
			display($title,'profile',$row,1);
			echo '<a id="edit" href="project.php?edit=0"><img src="" alt="edit"/></a>';
		}
	}
	elseif ($_GET['edit']==1)
	{
	}
	else
	?>