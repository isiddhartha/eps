<?php
include '../root.php';
include ($ROOT.'project/lib/lib.php'); //call to the lib.php file to include all dependencies for this page

//$db = new db; //connects to the POLE database

/* Class holds the whole project list structure. Links to database using db class.Calls proj_page class to create html framework. Creates a 
collate of all the projects on the page*/
/*Called by: display_panel method-proj_page class-proj_page.php*/
class proj_list
{
	var $resdb;
	var $full_list;
	var $page;
	
	function proj_list($sort)
	{
		$proj_id = array();
		$proj_title = array();
		$proj_admin = array();
		$proj_doc = array();
		$proj_type = array();
		$proj_vis = array();
		$proj_tags = array();
		$proj_img = array();
		$this->resdb= new db;
		if ($this->resdb)
		{
			$query="select * from project";
			$result=mysql_query($query);
			if($result)
			{
				for($i=0;$i<mysql_num_rows($result);$i++)
				{	
					$row=mysql_fetch_array($result);
					$proj_id[$i]=$row['proj_id'];
					$proj_title[$i]=$row['title'];
					$proj_admin[$i]=$row['admin'];
					$proj_doc[$i]=$row['doc'];
					$proj_type[$i]=$row['type'];
					$proj_vis[$i]=$row['visibility'];
					$proj_tags[$i]=$row['tags'];
					$proj_img[$i]=$row['image'];
					
				}
				if ($sort='default')
				{
				$this->full_list =array('id'=>$proj_id,'title'=>$proj_title,'admin'=>$proj_admin,'doc'=>$proj_doc,'type'=>$proj_type,'vis'=>$proj_vis,'tags'=>$proj_tags,'img'=>$proj_img);
			    }
			}
			else
				{$error=new errormod(1);
				exit;}
		}
		else
			{$error=new errormod(1);
			exit;}
	
	}
	/*this function is used to fill up the individual project_list cells in the grid*/
	/* $x holds the id of the project whose cell needs to be generated.*/
	function fill($x)
	{
	/*
	$x=($m*3)+$n;
	$z=count($this->full_list['id']);*/
	$cont;
	/*if ($x<$z)
	{*/$cont='<a href="project.php?proj_id='.$this->full_list['id'][$x].'&edit=0">'.'<div class="proj_cell">'.'<img src="data/proj'.$this->full_list['id'][$x].'/images/'.$this->full_list['img'][$x].'"/></br>'.'<div class="title">'.'<h2>'.$this->full_list['title'][$x].'</h2></div></br>'.'<div class="author">by '.
	'<h3>'.$this->full_list['admin'][$x].'</h3></div></br>'.'</div></a>';
	/*}*/
	/*else
	$cont=NULL;*/
	return $cont;
	}
	/*this function is used to create a grid on the panel and call the fill functions to fill up the individual cells*/
	function grid()
	{	
		/*$m;
		$n;
		$n=3; //no. of coulms in grid
		$c=count($this->full_list['id'])-1; // total no. of cells in grid
		$m=floor(($c/$n)+1); // no. of rows in grid
			
		echo '<table id="grid" class="project">';
		for ($i=0;$i<$m;$i++)
		{
		echo '<tr id="'.$i.'">';
		for ($j=0;$j<$n;$j++)
		{
		echo '<td id="'.$i.'_'.$j.'">';
		echo $this->fill($i,$j);
		echo '</td>';
		}
		echo '</tr>';
		}
		echo'</table>';*/
		$x=count($this->full_list['id']);
		for($i=0;$i<$x;$i++){
		echo $this->fill($i);
		}
	}
	
}


$sort=isset($_GET['sort'])?$_GET['sort']:'default';
$page=new proj_page('EPSELON::Explore','list',$sort);
?>