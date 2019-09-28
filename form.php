<html>
	<body>
		<p><strong>Lastname: </strong><?php echo $_POST["lastname"]; ?></p>
		<p><strong>Firstname: </strong><?php echo $_POST["firstname"]; ?></p>
		<p><strong>Email: </strong><?php echo $_POST["email"]; ?></p>
		<?php 
			if(isset($_POST["gender"]))echo "<p><strong>Gender: </strong>" . $_POST["gender"] . "</p>";
		?>
		<p><strong>School: </strong><?php echo $_POST["school"]; ?></p>
		<p><strong>Subjects: </strong><?php print_r($_POST["subject"]); ?></p>
		<p><strong>About Me: </strong><br/><?php echo $_POST["aboutme"]; ?></p>
		<?php 
			if(isset($_POST["fchecker"])) {
				$filename = $_POST["fchecker"];
				if (file_exists($filename)) {
					echo "The file $filename exists";
				} else {
					echo "The file $filename does not exist";
				}
			}
		?>
	</body>
</html>

