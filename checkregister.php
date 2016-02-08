<?php include("header.php");?>
	<div class="container piccontainer" id="blackmountain">
				<h2 class="pictitle">Registration.</h2>
				<div class="picitem">
					<h3>Server Message</h3>
					<?php
						$username = htmlspecialchars($_POST["username"]);
						$email = htmlspecialchars($_POST["email"]);
						$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
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
								if($fetch['username'] == $username)
								{
									$error = "Dieser Benutzername existiert schon.";
									break;
								}
								else if($fetch['email'] == $email)
								{
									$error = "Diese Email wird bereits verwendet.";
									break;
								}
							}
						}

						//Mit Datenbank verbinden und SQL ausführen
						if(!$error)
						{
							
							$insert = $db->prepare('INSERT INTO user (username, email, password, summary, member_since, pic)VALUES(:username, :email, :password, "My Text Here.................", strftime("%Y", "now", "+60 minutes"), "default");');
							$insert->bindValue(':username', $username, SQLITE3_TEXT);
							$insert->bindValue(':email', $email, SQLITE3_TEXT);
							$insert->bindValue(':password', $password, SQLITE3_TEXT);
							$result = $insert->execute();

							if($result === false)
							{
								$error = 'Das SQL konnte nicht ausgeführt werden: ' . $insert->lastErrorMsg();
							}
						}

						if(!$error)
						{
							echo "<p>The Registration was succesfull<p>";
							echo "<a href='index.php'><button>HOME</button></a>";
						}
						else
						{
							echo "<p>$error<p>";
							echo "<a href='register.php'><button>BACK</button></a>";
						}
						
					?>
				</div>
			</div>

</body>
</html>