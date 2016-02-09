<?php include("header.php");

	if(!isset($_SESSION['id']))
	{
		header("Location: index.php");
		exit();
	}

?>
<!-- Profileinstellungen -->
	<div class="container piccontainer" id="mountains2">
		<h2 class="pictitle">Personality.</h2>
		<div class="picitem">
			<h3>Settings</h3>
			<p>Notice:<br>If you click on update your account information will be replaced with all the inputs here</p>
		</div>
	</div> 
	<div class="container contentdiv">
		<form action="checksettings.php" method="post" autocomplete="off" onsubmit="return checkform()">
				<div class="formline row">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Username</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">Your username has to be longer than 5 characters</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><input value="<?php echo selectuser($_SESSION['id'])['username']; ?>" name="username" id="username" type="text" class="input" onchange="usernamecheck()"></div>
				</div>

				<div class="formline row">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Email</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">Enter a valid Email</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><input value="<?php echo selectuser($_SESSION['id'])['email']; ?>" name="email" id="email" type="email" class="input" onchange="emailcheck()"></div>
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
				<div class="row">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Summary</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">Description</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><textarea name="summary" id="summary" class="input textarea" maxlength="300" cols="10"><?php echo selectuser($_SESSION['id'])['summary'];?></textarea></div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Profile Picture</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">Pick your profile picture</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><select name="select" id="select" class="input">
															<option <?php if(selectuser($_SESSION['id'])['pic'] == 'default'){echo 'selected';} ?> value="default">default</option>
															<option <?php if(selectuser($_SESSION['id'])['pic'] == 'john'){echo 'selected';} ?> value="john">john</option>
															<option <?php if(selectuser($_SESSION['id'])['pic'] == 'minion'){echo 'selected';} ?> value="minion">minion</option>
															<option <?php if(selectuser($_SESSION['id'])['pic'] == 'asian'){echo 'selected';} ?> value="asian">guy</option>
															<option <?php if(selectuser($_SESSION['id'])['pic'] == 'blackwhite'){echo 'selected';} ?> value="blackwhite">girl</option>
															<option <?php if(selectuser($_SESSION['id'])['pic'] == 'she'){echo 'selected';} ?> value="she">girl with glasses</option>
															<option <?php if(selectuser($_SESSION['id'])['pic'] == 'blonde'){echo 'selected';} ?> value="blonde">blonde girl</option>
															<option <?php if(selectuser($_SESSION['id'])['pic'] == 'toy'){echo 'selected';} ?> value="toy">toy</option>
															<option <?php if(selectuser($_SESSION['id'])['pic'] == 'wesley'){echo 'selected';} ?> value="wesley">guitar guy</option>
															<option <?php if(selectuser($_SESSION['id'])['pic'] == 'pizza'){echo 'selected';} ?> value="pizza">pizza</option>
															<option <?php if(selectuser($_SESSION['id'])['pic'] == 'bard'){echo 'selected';} ?> value="bard">bard</option>
														</select></div>
				</div>
				<br>
				<div class="row"><div class="textalign col-xs-12"><button type="submit" name="submit">UPDATE</button></div></div>
			</form>
			<div class="row"><div class="textalign col-xs-12"><a href="view-user.php?id=<?php echo $_SESSION['id']; ?>"><button type="submit" name="submit">BACK</button></a></div></div>
	</div>
	<script src="scripts/validate.js"></script>

</body>
</html>