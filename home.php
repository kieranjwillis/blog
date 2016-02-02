<?php include("header.php");

	if(!isset($_SESSION['id']))
	{
		header("Location: login.php");
		exit();
	}

?>

	<div class="container piccontainer" id="book">
		<h2 class="pictitle">Everything.</h2>
		<div class="picitem">
			<h3>Home</h3>
			<p>See every thought here.</p>
		</div>
	</div>
	<div class="container contentdiv">
		<div class="col-md-8">
			<?php
				$db = db();
				$stmt = $db->prepare('SELECT * FROM post ORDER BY id DESC');
				$result = $stmt->execute();
				while($fetch = $result->fetchArray())
				{
					echo '<div class="row">';
					echo '<div class="col-md-3 postuser">';
					echo '<div class="nailthumb postuserpic"><a href="view-user.php?id=' . $fetch['user_id'] . '"><img src="pics/userpics/' . selectuser($fetch['user_id'])['pic'] . '.jpg"></a></div>';
					echo '<h1>' . selectuser($fetch['user_id'])['username'] . '</h1>';
					echo '</div>';
					echo '<a href="view-post.php?id=' . $fetch['id'] . '"><div class="postspace col-md-9">';
					echo '<h3>' . $fetch['tag'] . '</h3>';
					echo '<h1>' . $fetch['title'] . '</h1>';
					echo '<h4>' . $fetch['created_at'] . '</h4>';
					?><h2><?php foreach(preg_split("/((\r?\n)|(\r\n?))/", $fetch['summary']) as $line)
						{echo $line . '<br>';}?></h2><?php
					echo '</div></a>';
					echo '</div>';
				}

				if($result->fetchArray() === false)
				{
					echo "<h2>There's is no post at all. What's wrong with the people?</h2>";
				}
			?>
		</div>
		<div class="col-md-4">
			<div class="userspace">
				<h1><?php echo selectuser($_SESSION['id'])['username'];?></h1>
				<div class="nailthumb userpic"><img src="pics/userpics/<?php echo selectuser($_SESSION['id'])['pic'];?>.jpg"></div>
				<a href="view-user.php?id=<?php echo $_SESSION['id']; ?>"><button name="view-user">PROFILE</button></a><br>
				<form method="post" action="lib/common.php">
					<button name="logout">LOGOUT</button>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="scripts/jquery.nailthumb.1.1.js"></script>
		<script type="text/javascript">
	        jQuery(document).ready(function() {
	            jQuery('.nailthumb').nailthumb();
	        });
    	</script>

</body>
</html>