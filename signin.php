<!DOCTYPE html>
<html lang="en">
	<head>
		<title>My Signin</title>
	</head>
	<body>
		<?php
			if(isset($_POST['username'] && $_POST['password'])) {
				$contents = file_get_contents('users.txt');
				$users = unserialize($contents);
				}
		?>
		<form method="POST">
			<input type="text" placeholder="Username" name="username"/>
			<input type="password" placeholder="Password" name="password"/>
			<input type="submit" value="Submit" name="submit"/>
		</form>
	</body>
</html>