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
            
            
            li{list-style: none; line-height: 20px;}*/
            
            .container{
                background:rgb(245,245,245);
                font:14px calibri;
                
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
                margin-left:0;
                padding-left:0;
                list-style:none;
                cursor: pointer;
            }
            
            .path{
                list-style:none;
                
            }
            .path:hover{
                background:rgb(240,120,120);
            }
            ul{position:relative;  line-height:30px;}
            li{position:relative; padding-left:5%;}
            #control input{min-width:60px;}

			
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row ">
				<div class="col-md-12 col-lg-12	 text-center header">
					<h1>File Editor</h1>
				</div>
			</div>
			<form id="control" action="fileEditor.php" method="post">
				<div class="row">
					<div class="col-md-12">
						<input type="text" name = "path" />
						<br/>
						<br/>
						<input type="submit" class="btn btn-warning" name = "get" value="get" />
						<input type="submit" class="btn btn-warning" name = "write" value = "write"/>
						<input type="hidden" name="curPath"/>
					</div>	
				</div>
		
				<div class="row" >
					<div class="col-md-12">
					<span class="h4">File Structure:</span></br>
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
										echo '<li class="path">'.$path.'/'.$fp.'</li>'; //file entry
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
						<span class="h4">File Contents</span> 
						
						<?php
							if(isset($_POST['get']))
	                        {
	                            if(@$temp = $_POST["path"])
	                            {
	                                if(file_exists($temp))
	                                {
	                                	echo '<br/>Path: <span id="path" class="h5">'.$temp.'</span>';
	                                	echo '<textarea name="code" class="form-control" cols="10" rows="100">';
	                                    readfile($temp);
	                                    echo '</textarea>';
	                                }
	                                else
	                                {
	                                    echo "Could not retrieve file";
	                                }
	                            }
	                            else
	                            {
	                            	echo "No path specified";
	                            }
	                        }
	                        elseif(isset($_POST['write']))
	                        {
	                            if(isset($_POST['path'])&&$_POST['path']!=NULL)
	                            {
	                            	$path = $_POST['path'];
	                            	$newPath = $_POST['path'];
	                            	
	                            	while(file_exists($newPath))
	                            	{
	                            		$no=substr($newPath,-1);
	                            		$orgPath = substr($newPath,0,-1);
	                            		$no = (int) $no;
	                            		if(is_int($no))
	                            		{
	                            			$no++;
	                            			$newPath = $orgPath.$no;
	                            		}
	                            		else
	                            		{
	                            			$no=1;
	                            			$newPath .= $no;
	                            		}
	                            		
	                            	}
                         		                        		
                        	        $fp=fopen($newPath,"w");
                            		$res=fwrite($fp,$_POST['code']);
                            		if($res>0)
                            			echo "File Successfully Saved";
	                            }
	                            else
	                            {
	                            	echo "Path Not Specified";
	                            }
	                        }
						?>
					</div>
				</div>	
			</form>
		</div>
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" >
			$(document).ready(function()
            {
                $('.dir>li').hide();
                $('#control :text').css({'width':'80%','height':'40px'});
                $('.dir').click(function()
	                {
	                    expand(this);
	                    return false;
	                });
                $('.path').click(function()
	                {
	                    extract(this);
	                    return false;
	                });
                $('.dir').mouseover(function()
	                {
	                    $(this).css('background','rgb(240,50,50)');
	                    return false;
	                });
                $('.dir').mouseout(function()
	                {
	                    $(this).css('background','none');
	                });
                $("input[name='write']").click(function()
                	{
                		var x = $("#path").text();
                		//$("input[name='path']").val(x);
            		});
            });
            
            function expand(a)
            {                
                $(a).children('li').toggle();
                
            }
            
            function extract(filePath)
            {
                $(':text').val($(filePath).text());
                
            }
		</script>
	</body>
</html>
