<?php include("header.php");?>
	<div class="container piccontainer" id="person">
				<h2 class="pictitle">Update.</h2>
				<div class="picitem">
					<h3>Server Message</h3>
					<?php
						$username = $_POST["username"];
						$email = $_POST["email"];
						$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
						$summary = $_POST["summary"];
						$pic = $_POST["select"];
						$error = '';

						if(!checkdatabase())
						{
							$error = "Die Datenbank ist nicht erreichbar.";
						}

						//Username überprüfen
						if(!$error)
						{
							$db = db();
							$select = $db->query("SELECT * FROM user");
							
							while($fetch = $select->fetchArray())
							{
								if(selectuser($_SESSION['id'])['username'] != $username)
								{
									if($fetch['username'] == $username)
									{
										$error = "Dieser Benutzername existiert schon.";
										break;
									}
								}
								if(selectuser($_SESSION['id'])['email'] != $email)
								{
									if($fetch['email'] == $email)
									{
										$error = "Dieser Email wird bereits verwendet.";
										break;
									}
								}
							}
						}

						//update
						if(!$error)
						{
							$db = db();
							$update = $db->prepare("UPDATE user SET username=:username, email=:email, password=:password, summary=:summary, pic=:pic WHERE id=:sessionuser;");
							$update->bindValue(":username", $_POST['username'], SQLITE3_TEXT);
							$update->bindValue(":password", $password, SQLITE3_TEXT);
							$update->bindValue(":email", $_POST['email'], SQLITE3_TEXT);
							$update->bindValue(":summary", $_POST['summary'], SQLITE3_TEXT);
							$update->bindValue(":pic", $_POST['select'], SQLITE3_TEXT);
							$update->bindValue(":sessionuser", $_SESSION['id'], SQLITE3_TEXT);

							$result = $update->execute();

							if($result === false)
							{
								$error = 'Das SQL konnte nicht ausgeführt werden: ' . $result->lastErrorMsg();
							}
						}

						if(!$error)
						{
							echo "<p>The Update was succesfull<p>";
							echo "<a href='home.php'><button>HOME</button></a>";
						}
						else
						{
							echo "<p>$error<p>";
							echo "<a href='user-settings.php'><button>BACK</button></a>";
						}
			
					?>
				</div>
			</div>

</body>
</html>