<?php include("header.php");?>
	<div class="container piccontainer" id="mountains">
				<h2 class="pictitle">Update.</h2>
				<div class="picitem">
					<h3>Server Message</h3>
					<?php
						$error="";

						if(!checkdatabase())
						{
							$error = "Die Datenbank ist nicht erreichbar.";
						}

						//delete
						if(!$error)
						{
							$db = db();
							$delete = $db->prepare('DELETE FROM comments WHERE id=:id');
							$delete->bindValue(':id', $_GET['id'], SQLITE3_INTEGER);
							$result = $delete->execute();

							if($result === false)
							{
								$error = 'Das SQL konnte nicht ausgeführt werden: ' . $result->lastErrorMsg();
							}
							else
							{
								header("Location: view-post.php?id=" . $_GET["post_id"]);
								exit();
							}
						}
						?>

</body>
</html>