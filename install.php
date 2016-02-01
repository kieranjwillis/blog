<?php include("header.php");?>
	<div class="container piccontainer" id="sunrise">
				<h2 class="pictitle">Installation.</h2>
				<div class="picitem">
					<h3>Server Message</h3>
					<?php
						require_once 'lib/common.php';
						$error = '';
						$root = getRootPath();
						$database = getDatabasePath();

						unset($_SESSION['id']);

						//Falls Datenbank schon existiert
						if(is_readable($database))
						{
							$error = "Bitte loesche die vorhandene Datenbank manuell bevor du diese Installation durchfuehrst und aktualisiere die Seite";
						}

						//Datenbank erstellen
						if(!$error)
						{
							$db = db();
							if(!$db)
							{
								$error = "Es konnte keine Datenbank erstellt werden.";
							}
						}

						//SQL Datei finden
						if(!$error)
						{
							$sql = @file_get_contents($root . '/data/init.sql');

							if($sql === false)
							{
								$error = 'Die SQL Datei konnte nicht gefunden werden';
							}
						}

						//Mit Datenbank verbinden und SQL ausführen
						if(!$error)
						{
							$result = $db->exec($sql);
							if($result === false)
							{
								$error = 'Das SQL konnte nicht ausgeführt werden: ' . print_r($pdo->errorInfo(), true);
							}
						}

						//admin registrieren
						if(!$error)
						{
							$password = password_hash("gibbiX1234$", PASSWORD_DEFAULT);
							$email = "admin@gibb.ch";
							$username = "admin";
							
							$insert = $db->prepare('INSERT INTO user (username, email, password, summary, member_since, pic)VALUES(:username, :email, :password, "This is the admin account. So be careful what you do.", strftime("%Y", "now", "+60 minutes"), "bard");');
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
							echo "<p>Die Installation war erfolgreich.<p>";
						}
						else
						{
							echo "<p>$error<p>";
						}
						
					?>
				</div>
			</div>

</body>
</html>