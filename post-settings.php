<?php include("header.php");

	if(!isset($_SESSION['id']))
	{
		header("Location: index.php");
		exit();
	}

?>

	<div class="container piccontainer" id="keyboard">
		<h2 class="pictitle">Change.</h2>
		<div class="picitem">
			<h3>Settings</h3>
			<p>Did you change your mind?</p>
		</div>
	</div>
	<div class="container contentdiv">
		<form action="checkpostsettings.php?id=<?php echo $_GET['id']; ?>" method="post" autocomplete="off" onsubmit="return checkformpost()">
				<div class="formline row">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Title</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">Set the Title</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><input name="title" value="<?php echo selectpost($_GET['id'])['title']; ?>" id="titleform" type="text" class="input"></div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Summary</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">A short summary of the content</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><textarea name="summary" id="summary" class="input textarea" maxlength="600" cols="10"><?php echo selectpost($_GET['id'])['summary']; ?></textarea></div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Content</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">The main content of the post</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><textarea name="content" id="content"class="input textareacontent" maxlength="7000" cols="10"><?php echo selectpost($_GET['id'])['body']; ?></textarea></div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-4 col-sm-2 col-xs-12"><label class="label">Theme</label></div>
				<div class="col-md-4 col-sm-6 col-xs-6 right"><span class="span">Choose the group it belongs to</span></div>
				<div class="col-md-4 col-sm-4 col-xs-6"><select name="select" id="select" class="input">
															<option <?php if(selectpost($_GET['id'])['tag'] == 'RANDOM'){echo 'selected';} ?> value="RANDOM">Random</option>
															<option <?php if(selectpost($_GET['id'])['tag'] == 'MUSIC'){echo 'selected';} ?> value="MUSIC">Music</option>
															<option <?php if(selectpost($_GET['id'])['tag'] == 'LIFESTYLE'){echo 'selected';} ?> value="LIFESTYLE">Lifestyle</option>
															<option <?php if(selectpost($_GET['id'])['tag'] == 'DIARY'){echo 'selected';} ?> value="DIARY">Diary</option>
															<option <?php if(selectpost($_GET['id'])['tag'] == 'HUMOR'){echo 'selected';} ?> value="HUMOR">Humor</option>
															<option <?php if(selectpost($_GET['id'])['tag'] == 'QUOTATION'){echo 'selected';} ?> value="QUOTATION">Quotation</option>
														</select></div>
				</div>
				<br>
				<br>
				<div class="row"><div class="textalign col-xs-12"><button type="submit" name="submit">SUBMIT</button></div></div>
				<div class="row"><div class="textalign col-xs-12"><button type="submit" name="delete">DELETE</button></div></div>
			</form>
			<div class="row"><div class="textalign col-xs-12"><a href="view-post.php?id=<?php echo $_GET['id'];?>"><button type="submit" name="submit">BACK</button></a></div></div>
		</div>

	<script src="scripts/validate.js"></script>

</body>
</html>