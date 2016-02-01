<?php include("header.php");
	if(isset($_SESSION['id']))
	{
		header("Location: home.php");
	}
	?>
		
		<div class="container piccontainer" id="town">
			<h2 class="pictitle">Long time no see.</h2>
			<div class="picitem">
				<h3>Login</h3>
				<p>Please enter your login information.</p>
			</div>
		</div>
		<div class="container contentdiv">
			<form action="checklogin.php" method="post" id="loginform" autocomplete="off">
				<div class="row formline">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Email</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">Enter your email here</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><input type="email" name="email" id="email" class="input"></div>
				</div>
				<div class="row formline">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Password</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">Your password</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><input type="password" name="password" id="password" class="input"></div>
				</div>
				<br>
				<div class="row"><div class="textalign col-xs-12"><button type="submit" name="submit">LOGIN</button></div></div>
			</form>
				<div class="row"><div class="textalign col-xs-12"><a href="index.php"><button>BACK</button></a></div></div>
		</div>
	</body>
</html>
