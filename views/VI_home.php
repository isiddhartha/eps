
<body>
	<div id="wrapper">
		<div class="head">
		<img src="/img/logo.png" alt = "epselon"/>
		</div>
		<div class="cont">
			<div class="box">
				<div class="box_in">
					<div class="feed">
					<?php echo $out; ?>
					</div>
					<form action="/lib/login.php" method="post">
					Username</br>
					<input name="usr" type="text"/></br>
					Password</br>
					<input  name="pass" type="password"/></br>
					<input class="big" value="Login" type="submit"/>
					</form>
					</br>
					<a href="forgot.php">Forgot Username/Password</a></br>
					Would You like to join us?<a href="register.php">Register</a>
				</div>
			</div>
			<div class="explore"><a href="explore.php">EXPLORE</a></div>
		</div>
	</div>
</body>
