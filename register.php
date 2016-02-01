<?php include("header.php");?>

		<div class="container piccontainer" id="forest">
			<h2 class="pictitle">Welcome.</h2>
			<div class="picitem">
				<h3>Registration</h3>
				<p>Make sure that all fields are filled.</p>
			</div>
		</div>
		<div class="container contentdiv">
			<form action="checkregister.php" method="post" id="registerform" autocomplete="off" onsubmit="return checkform()">
				<div class="formline row">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Username</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">Your username has to be longer than 5 characters</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><input name="username" id="username" type="text" class="input" onchange="usernamecheck()"></div>
				</div>

				<div class="formline row">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Email</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">Enter a valid Email</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><input name="email" id="email" type="email" class="input" onchange="emailcheck()"></div>
				</div>

				<div class="formline row">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Password</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">Your password must be at least 8 characters</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><input name="password" id="password" type="password" onchange="passwordcheck()" class="input"></div>
				</div>

				<div class="formline row">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Confirm Password</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">Confirm your password</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><input name="passwordconfirm" id="passwordconfirm" onchange="passwordconfirmcheck()"type="password" class="input"></div>
				</div>
				<br>
				<div class="row"><div class="textalign col-xs-12"><button type="submit" name="submit">CONFIRM</button></div></div>
			</form>
				<div class="row"><div class="textalign col-xs-12"><a href="index.php"><button>BACK</button></a></div></div>
		</div>		
		<script src="scripts/validate.js"></script>
	</body>
</html>
		