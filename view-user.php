<?php include("header.php");

	if(!isset($_SESSION['id']))
	{
		header("Location: login.php");
		exit();
	}

?>
<!-- Ansehen des Userprofils -->
		<div class="container piccontainer" id="he">
			<h2 class="pictitle">My blog entries.</h2>
			<div class="picitem">
				<h3><?php echo selectuser($_GET['id'])['username'] ?>'s World</h3>
				<p>It's blank</p>
			</div>
		</div>
		<div class="container contentdiv">
			<div id="postpage" class="col-md-8">
				<div id="posts">
					<?php
						$db = db();
						$stmt = $db->prepare('SELECT * FROM post WHERE user_id=:id ORDER BY id DESC');
						$stmt->bindValue(':id', $_GET['id'], SQLITE3_INTEGER);
						$result = $stmt->execute();
						while($fetch = $result->fetchArray())
						{
							echo '<a href="view-post.php?id=' . $fetch['id'] . '"><div class="postspace">';
							echo '<h3>' . $fetch['tag'] . '</h3>';
							echo '<h1>' . $fetch['title'] . '</h1>';
							echo '<h4>' . $fetch['created_at'] . '</h4>';
							?><h2><?php foreach(preg_split("/((\r?\n)|(\r\n?))/", $fetch['summary']) as $line)
								{echo $line . '<br>';}?></h2><?php
							echo '</div></a>';
						}
						if($result->fetchArray() === false)
						{
							echo "<h2>You haven't posted anything yet.</h2>";
						}
					?>
					<button type="submit" name="all">ALL</button>
					<button name="next">&rarr;</button>
				</div>
			</div>
			<div class="col-md-4">
				<div class="userspace">
					<h1><?php echo selectuser($_GET['id'])['username'];?></h1>
					<div class="nailthumb userpic"><img src="pics/userpics/<?php echo selectuser($_GET['id'])['pic']; ?>.jpg"></div>
					<p>Member since <?php echo selectuser($_GET['id'])['member_since'];?></p>
					<p><?php foreach(preg_split("/((\r?\n)|(\r\n?))/", selectuser($_GET['id'])['summary']) as $line)
						{echo $line . "<br>";} ?></p>
					<a href="home.php"><button name="home">HOME</button></a><br>
					<?php
						if($_GET['id'] == $_SESSION['id'])
						{ ?>
							<a href="user-post.php"><button name="post">POST</button></a><br>
							<a href="user-settings.php"><button name="settings">SETTINGS</button></a><br>
							<form method="post" action="lib/common.php">
								<button name="logout">LOGOUT</button>
							</form>
						<?php }
					?>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="scripts/jquery.js"></script> 
		<script type="text/javascript" src="scripts/jquery.nailthumb.1.1.js"></script>
		<script type="text/javascript">
	        jQuery(document).ready(function() {
	            jQuery('.nailthumb').nailthumb();
	        });
    	</script>
</body>
</html>