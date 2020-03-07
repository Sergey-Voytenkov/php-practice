<?php
	if (isset($_COOKIE['username'])) {
		header('Location: index.php'); 
		exit;
	}
	if(isset($_POST['username'])) if(strlen($_POST['username']) < 1) $error = "Please Input Username.";
		else if(strlen($_POST['password'] < 8)) $error = "The Password must be 8 or more Numbers.";
	
	if(isset($_POST['username'], $_POST['password'])) {
		$contents = file_get_contents('users.txt');
		$users = unserialize($contents);
		foreach($users as $user) {
			
			if ($user['username'] != $_POST['username']) continue;
			if ($user['password'] != $_POST['password']) continue;
			
			setcookie('username', $_POST['username'], time()+60*5, "/");
			header('Location: index.php');
			exit;
		}
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>My Signin</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="signin_overlay">
			<div class="back">
				<form method="POST">
					<input type="text" placeholder="Username" name="username"/>
					<input type="password" placeholder="Password" name="password"/>
					<input type="submit" value="Submit" name="submit"/>
					<?php if (isset($error)) echo "<div class=\"error\">$error</div>"; ?>
				</form>
			</div>
		</div>
	</body>
</html>