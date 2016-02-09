<?php include("header.php");

	if(!isset($_SESSION['id']))
	{
		header("Location: login.php");
		exit();
	}
	if(!isset($_GET['id']))
	{
		header("Location: home.php");
		exit();
	}
?>
<!-- Ansehen eines Posts -->
		<div class="container piccontainer" id="deer">
			<h2 class="pictitle">Welcome.</h2>
			<div class="picitem">
				<h3>A blog entry</h3>
				<p>Read the blog entry below.</p>
			</div>
		</div>
		<div class="container contentdiv">
			<div class="col-md-10 postpostspace">
				<?php
				$db = db();
				$stmt = $db->prepare('SELECT * FROM post WHERE id=:id');
				$stmt->bindValue(':id', $_GET['id'], SQLITE3_INTEGER);
				$result = $stmt->execute();
				while($fetch = $result->fetchArray())
				{
					echo "<h1>" . $fetch['title'] . "</h1>";
					echo "<h3>" . $fetch['tag'] . "</h3>";
					echo "<h4>" . $fetch['created_at'] . "</h4>";
					?><h2><?php foreach(preg_split("/((\r?\n)|(\r\n?))/", $fetch['summary']) as $line)
						{echo $line . '<br>';}?></h2><?php
					?><p><?php foreach(preg_split("/((\r?\n)|(\r\n?))/", $fetch['body']) as $line)
						{echo $line . '<br>';}?></p>
			</div>
			<div class="col-md-2 userpostspace">
				<div class="nailthumb userpic userpostpic"><a href="view-user.php?id=<?php echo $fetch['user_id']; ?>"><img src="pics/userpics/<?php echo selectuser($fetch['user_id'])['pic'] ?>.jpg"></a></div>
				<h4>Created by<br><?php echo selectuser($fetch['user_id'])['username'] ?></h4>
				<a href="home.php"><button>HOME</button></a>
				<?php
					if($_SESSION['id'] == $fetch['user_id'])
					{ ?>
						<a href="post-settings.php?id=<?php echo $_GET['id'] ?>"><button>EDIT</button></a>
					<?php }
				?>
			</div>
				<?php }
				?>
			<form action="checkcomment.php?id=<?php echo $_GET['id'] ?>" method="post" onsubmit="return checkcomment()">
				<div class="col-md-12">
					<?php
					$stmt = $db->prepare('SELECT COUNT(id) FROM comments WHERE post_id = :id');
					$stmt->bindValue(':id', $_GET['id'], SQLITE3_INTEGER);
					$result = $stmt->execute();
					while($fetch = $result->fetchArray())
					{echo "<h5>" . $fetch[0] . " Comments</h5>";}
					?>
					<hr id="hr">
					<div class="col-md-6">
						<textarea id="commenttextarea" name="commenttextarea" maxlength="500" class="input" type="text"></textarea>
					</div>
					<div class="col-md-6">
						<button>COMMENT</button>
					</div>
				</div>
			</form>
			<div class="col-md-12" id="commentarea">
				<?php
					$stmt = $db->prepare('SELECT * FROM comments WHERE post_id = :id');
					$stmt->bindValue(':id', $_GET['id'], SQLITE3_INTEGER);
					$result = $stmt->execute();
					while($fetch = $result->fetchArray())
					{ ?>
						<div class="commentspace row">
						<div class="col-md-2 col-xs-4 col-sm-2 commentuser">
							<div class="nailthumb commentpic"><a href="view-user.php?id=<?php echo $fetch['user_id'];?>"><img src="pics/userpics/<?php echo selectuser($fetch['user_id'])['pic']; ?>.jpg"></a></div>
							<h3><?php echo selectuser($fetch['user_id'])['username']; ?></h3>
						</div>
						<div class="col-md-10 col-xs-8 col-sm-10 commenttext">
							<h6><?php echo $fetch['created_at'] ?></h6>
							<p><?php foreach(preg_split("/((\r?\n)|(\r\n?))/", $fetch['body']) as $line)
						{echo $line . '<br>';}?></p>
						<?php if($fetch['user_id'] == $_SESSION['id'] or selectpost($_GET["id"])['user_id'] == $_SESSION['id']){echo "<a href='deletecomment.php?id=" . $fetch['id'] . "&post_id=" . $fetch['post_id'] . "'><h5>DELETE</h5></a>";}?>

						</div>
					</div>
					<?php }
				?>
			</div>
		</div>

		<script type="text/javascript" src="scripts/jquery.nailthumb.1.1.js"></script>
		<script type="text/javascript">
	        jQuery(document).ready(function() {
	            jQuery('.nailthumb').nailthumb();
	        });
    	</script>
    	<script type="text/javascript">
    		function checkcomment()
    		{
				var text = document.getElementById("commenttextarea");
				if(text.value == "" || text.value == " ")
				{
					return false;
				}
				else
				{
					return true;
				}
    		}
    	</script>

</body>
</html>