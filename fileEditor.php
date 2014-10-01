<html>
	<head>
		<title>File Editor||EPSELON</title>
		
		<style rel="stylesheet" type="text/css" >
			html,body{border:0; padding:0; margin: 0; width: 100%; height: 100%;}
			h1{font:25px calibri; text-align:center; color:rgb(0,180,100);}
			#control{height: auto; width: 98%; margin: 1%;}
			#control form{height:50px; width: 100%; z-index:99;}
			textarea{width:98%; height: 1000px; margin:1%; text-align: :left;}
			li{list-style: none; line-height: 20px;}

		</style>
	</head>
	<body>
		<h1>File Editor</h1>
		<div id="control" >
			File Structure:</br>
			<?php

				$parent = realpath(dirname(__FILE__)); //derives real path of root directory, where
													//where this file is located
				
				$dr=opendir($parent);//opens the root directory and returns handle
				
				
//recursive function which populates the directory structure in lost format
				function extract($handle)
				{
					static $nest = 0;
					$nest++;
					if($nest<=10)
					{
						$dr=opendir($handle);//opens the path in hand
						echo "<ul>";	//creates new list
						while($fp = readdir($dr)) //if not end of directory then continue with next entry
						{
							if(!is_dir($fp))
							{
								echo "<li>".$fp."</li>"; //file entry
							}	
							else
							{//if it is a directory then use the recursive function
								if($fp!="." && $fp!= ".." && $fp != ".git")
								{	
									extract($fp);	
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
			<form action="fileEditor.php" method="post">
				<input type="text" name = "path" />
				<input type="submit" value="get" />
			</form>
		</div>
		<textarea>
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
	</body>
</html>
