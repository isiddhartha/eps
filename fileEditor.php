<!DOCTYPE html>
<html lang="en">
	<head>
		<title>File Editor||EPSELON</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<style rel="stylesheet" type="text/css" >
			/*
			html,body{border:0; padding:0; margin: 0; width: 100%; height: 100%;}
			h1{font:25px calibri; text-align:center; color:rgb(0,180,100);}
			#control{height: auto; width: 98%; margin: 1%;}
			#control form{height:50px; width: 100%; z-index:99;}
			
			ul{padding-left:30px;}
			li{list-style: none; line-height: 20px;}*/
			
			.container{
				background:rgb(245,245,245);
			}
			.row{
				margin-bottom:10px;
			}
			.header{
				background: rgb(0,150,200);
				font-family:calibri;
				color:#FFF;
			}
			.dir{
				margin-left: 0;
				padding-left: 0;
				list-style:none;
				cursor: pointer;
			}
			.path{
				margin-left: 20px;
				list-style:none;
				line-height:30px;
				background:#EEE;
			}
			.path:hover{
				background:#CCC;
			}
			
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row ">
				<div class="col-md-12 col-lg-12	 text-center header">
					<h1>File Editor</h1>
				</div>
			</div>
		
			<div class="row" >
				<div class="col-md-12">
				File Structure:</br>
				<?php

					$parent = realpath(dirname(__FILE__)); //derives real path of root directory, where
														//where this file is located
					
					//$dr=opendir($parent);//opens the root directory and returns handle
					extr($parent);	
					
					//recursive function which populates the directory structure in lost format
					function extr($handle)
					{
						static $nest = 0;
						$nest++;
						if($nest<=10)
						{
							$path = realpath($handle);
							
							$dr=opendir($handle);//opens the path in hand
							echo '<ul class="dir"> <span class="glyphicon glyphicon-plus"></span>'.realpath($handle);	//creates new list
							while($fp = readdir($dr)) //if not end of directory then continue with next entry
							{
								if(!is_dir($fp))
								{
									echo '<li class="path">'.$path.'\\'.$fp.'</li>'; //file entry
								}	
								else
								{//if it is a directory then use the recursive function
									if($fp!="." && $fp!= ".." && $fp != ".git")
									{	
										$nest = 0;
										echo "<li>";
										extr(realpath($fp));	
										echo "</li>";
									}
								}
							}
							echo "</ul>"; //close list
						}
						else
						{
							echo "Nested Directory is too deep";
						}
					}
				?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form action="fileEditor.php" method="post">
						<input type="text" name = "path" />
						<input type="submit" value="get" />
					</form>
				</div>	
			</div>
			<div class="row">
				<div class="col-md-12">
					<textarea class="form-control" rows="10">
						<?php
							if(@$temp = $_POST["path"])
							{
								if(file_exists($temp))
								{
									readfile($temp);
								} 
							}
						?>
					</textarea>
				</div>
			</div>	
		</div>
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" language = "javascript">
			$(window).ready(function()
			{
				$('.path').css('display','none');
				$('.dir').click(function()
				{
					$(this).css('display','block');	
				
				});
			});

		</script>
	</body>
</html>
