<?php
	if (isset($_COOKIE['username'])) header('Location: index.php'); 

	if(isset($_POST['username'], $_POST['password'])) {
		$contents = file_get_contents('users.txt');
		$users = unserialize($contents);
		foreach($users as $user) {
			
			if ($user['username'] != $_POST['username']) continue;
			if ($user['password'] != $_POST['password']) continue;
			
			setcookie('username', $_POST['username'], time()+60*5, "/");
			header('Location: index.php');
		}
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>My Signin</title>
	</head>
	<body>
		<form method="POST">
			<input type="text" placeholder="Username" name="username"/>
			<input type="password" placeholder="Password" name="password"/>
			<input type="submit" value="Submit" name="submit"/>
		</form>
	</body>
</html>