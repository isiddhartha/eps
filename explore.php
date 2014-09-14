<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  

<?php
	//code to include config file and dependency scripts
	require_once ('config.php');
	$rootobj = new config();
	$ROOT = $rootobj->ROOT;
	include_once ($ROOT.'project/lib/lib.php'); //call to the lib.php file to include all dependencies for this page
	
	//include session authentication code<--
	$session = new sessionControl();
	
?>

<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="keywords" content="project colloboration, project management, epselon, project host, event colloboration, event management "/>
	<meta name="description" content="Epselon is an online colloboration and project management application, which allows people around the world to host projects or events and to colloborate with each other.
	People use it to stay on top of their work, and to promote a higher level of seamless teamwork and wider exposure to their work."/>
	<title>EPSELON|Explore</title>
	<link rel="shortcut icon" href="img/icon.png"/>
	<link rel="stylesheet" href="/project/style/explore.css" type="text/css" media="screen" charset="utf-8"/>
	<link rel="stylesheet" href="/project/style/grid.css" type="text/css" media="screen" charset="utf-8" />
	<script type="text/javascript"  src="/scripts/jQuery.js"></script>
	<script type="text/javascript"  src="/project/scripts/explore.js"></script>
</head>

<body>
	<div class="wrapper">
		<?php
			$header = new header();
			$header->displayHeader(); 
		?>	
		
		<div class="nav">
		<?php
			$nav = new nav();
			$nav->displayNav();
			displaySearch();
		?>
		</div>
		
		<div class="cont">
			<div class="tab">
			</div>
			<div class="grid">
				
				<?php
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
						$proj_img = array();
						$proj_desc=array();
						$db = new db();
						$db = $db->getDb();
						if ($db)
						{
							$query="select * from project";
							$result=$db->query($query);
							if($result->num_rows)
							{
								for($i=0;$i<$result->num_rows;$i++)
								{	
									$row=$result->fetch_row();
									$proj_id[$i]=$row[0];
									$proj_title[$i]=$row[1];
									$proj_admin[$i]=$row[2];
									$proj_doc[$i]=$row[3];
									$proj_type[$i]=$row[4];
									$proj_tags[$i]=$row[5];
									$proj_img[$i]=$row[6];
									$proj_desc[$i]=$row[7];
								}
								if ($sort='default')
								{
									$this->full_list =array('id'=>$proj_id,'title'=>$proj_title,'admin'=>$proj_admin,'doc'=>$proj_doc,'type'=>$proj_type,'vis'=>$proj_vis,'img'=>$proj_img,'desc'=>$proj_desc);
								}
							}
							else
							{
								$error=new errormod(1);
								exit;
							}
						}
						else
						{
							$error=new errormod(1);
							exit;
						}
					
					}
					
					/*this function is used to fill up the individual project_list cells in the grid*/
					/* $x holds the id of the project whose cell needs to be generated.*/
					
					//href="project.php?proj_id='.$this->full_list['id'][$x].'&&edit=0"
					function fill($x)
					{
						$cont;
						$cont='<a class="proj_cell" href="project.php?proj_id='.$this->full_list['id'][$x].'">
									<div class="in">
										<img src="/project/data/proj'.$this->full_list['id'][$x].'/images/'.$this->full_list['img'][$x].'"/>
										<div class="title">
											<h2>'.$this->full_list['title'][$x].'</h2>
										</div>
										<div class="author">Admin: 
											<h3>'.$this->full_list['admin'][$x].'</h3>
										</div>
										<div class="desc">'.
											$this->full_list['desc'][$x]
										.'</div>
										<div class="doc">Started: '.
											$this->full_list['doc'][$x]
										.'</div>
										<div class="share" >
											<div class="link" href="www.facebook.com">facebook</div>
											<div class="link" href="www.twitter.com">twitter</div>
											<div class="link" href="www.reddit.com">reddit!</div>
										</div>
									</div>
								</a>';
						return $cont;
					}
					function test($i)
					{
						echo '<div class="proj_cell">'.$this->full_list['id'][$i].' '.$this->full_list['title'][$i] .'</div>';
					}
					
					/*this function is used to create a grid on the panel and call the fill functions to fill up the individual cells*/
					function grid()
					{	
						$x=count($this->full_list['id']);
						for($i=0;$i<$x;$i++)
						{
							echo $this->fill($i);
						}
					}
					
				}


				$sort=isset($_GET['sort'])?$_GET['sort']:'default';
				$proj = new proj_list($sort);
				$proj->grid();
				?>
			</div>
			<div class="advert">
			</div>
		</div>

		<?php
		$footer = new footer;
		$footer->displayFooter();

		?>
	</div>
</body>
</html>