<?php include("header.php");?>
	<div class="container piccontainer" id="blackmountain">
		<h2 class="pictitle">Login.</h2>
		<div class="picitem">
			<h3>Server Message</h3>
			
			<?php
				$email = htmlspecialchars($_POST['email']);
				$password = htmlspecialchars($_POST["password"]);
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
						
						if($fetch['email'] == $email && password_verify($password, $fetch['password']))
						{
							$_SESSION['id'] = $fetch['id'];
							header("Location: home.php");
							exit();
							break;
						}
						else
						{
							$error = "Diese Kombination von Benutzername und Password gibt es nicht.";
						}
					}
				}

				if($error)
				{
					echo "<p>$error</p>";
					echo "<a href='login.php'><button>BACK</button></a>";
				}
				else
				{
					echo "<p>Entweder sind gar keine User registriert oder ein Fehler ist passiert.</p>";
				}
			
			?>
		</div>
	</div>

</body>
</html>