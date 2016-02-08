<?php include("header.php");?>
	<div class="container piccontainer" id="mountains">
				<h2 class="pictitle">Update.</h2>
				<div class="picitem">
					<h3>Server Message</h3>
					<?php
						$comment = $_POST["commenttextarea"];
						$id = $_GET["id"];
						$error = '';

						if(!checkdatabase())
						{
							$error = "Die Datenbank ist nicht erreichbar.";
						}

						//post updaten
						if(!$error)
						{
							$db = db();
							$insert = $db->prepare('INSERT INTO comments (post_id, user_id, body, created_at) VALUES(:id,:user_id,:body,strftime("%H:%M %d.%m.%Y", "now", "+60 minutes")); ');
							$insert->bindValue(':id', $id, SQLITE3_INTEGER);
							$insert->bindValue(':user_id', $_SESSION['id'], SQLITE3_INTEGER);
							$insert->bindValue(':body', $comment, SQLITE3_TEXT);
							$result = $insert->execute();

							if($result === false)
							{
								$error = 'Das SQL konnte nicht ausgeführt werden: ' . $result->lastErrorMsg();
							}
							else
							{
								header("Location: view-post.php?id=" . $id);
								exit();
							}
						}

						if($error)
						{
							echo "<p>$error<p>";
							echo "<a href='home.php'><button>BACK</button></a>";
						}
						?>

</body>
</html>
