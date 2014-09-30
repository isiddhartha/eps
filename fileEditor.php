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

				$parent = dirname(__FILE__); 
				
				$dp=opendir($parent);
				$counter = 1;
				while($fp = readdir($dp))
				{
					if(!is_dir($fp))
					{
						echo $counter. " ". $fp."</br>";
						$counter++;
					}	
					else
					{

						if($fp!="." && $fp!= ".." && $fp != ".git")
						{	
							echo $counter. " ". $fp;
							dig($fp);	
							$counter++;
						}	
					}
				}

				function dig($path)
				{
					$counter=1;
					$dp=opendir($path);
					echo "<ol>";
					while($fp = readdir($dp))
					{
							
						if(!is_dir($fp))
						{
							echo "<li> ".$counter." " .$fp."</li>";
							$counter++;
						}	
						else
						{
							if($fp!="." && $fp!= ".." && $fp != ".git")
							{	
								echo $counter. " ". $fp;
								dig($fp);	
								$counter++;
							}
						}
						
					}
					echo "</ol>";
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