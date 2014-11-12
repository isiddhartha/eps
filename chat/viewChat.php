<?php
/* chat page View*/
?>
<link rel = "stylesheet" href="basic.css"/>

<body>
<div id="usersonline">
<?php
	while($res= $users->fetch_array())
	{
		echo '<div class="cntlink">'.$res['user_id'].'</div>';
	}
?>
</div>
</body>