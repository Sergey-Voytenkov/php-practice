<html>
	<body>
		<p><strong>Lastname: </strong><?php echo $_POST["lastname"]; ?></p>
		<p><strong>Firstname: </strong><?php echo $_POST["firstname"]; ?></p>
		<p><strong>Email: </strong><?php echo $_POST["email"]; ?></p>
		<?php 
			if(isset($_POST["gender"])) echo "<p><strong>Gender: </strong>" . $_POST["gender"] . "</p>";
		
			if(isset($_POST["school"])) echo "<p><strong>School: </strong>" . $_POST["school"] . "</p>";
		
			if(isset($_POST["subject"])) echo "<p><strong>Subjects: </strong>" . $_POST["subject"] . "</p>";
		
			if(isset($_POST["aboutme"])) echo "<p><strong>About Me: </strong>" . $_POST["aboutme"] . "</p>";
		
			if(isset($_POST["fchecker"])) {
				$filename = $_POST["fchecker"];
				if (file_exists($filename)) {						
					$handle = fopen($filename, 'r');
					
					fgets()
					
					fclose($handle);	
						
					
				} else {
					echo "The file $filename does not exist<br>";
				}
				
		
			}
		
			
		?>
	</body>
</html>

