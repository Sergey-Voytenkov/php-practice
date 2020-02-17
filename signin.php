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
		<style>
			html, body {
				height: 100%;
				margin: 0;
			}
			body {
				background-image: url(background.jpg);
				background-size: cover;
			}
			.overlay {
				width: 100%;
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				background: rgba(0,0,0,0.1);
				z-index:1;
			}
			.back {
				display: flex;
				position: aboslute;
				width: 500px;
				height: 400px;
				background: rgba(250,250,250,0.25);
				border-radius: 100px;
				z-index: 2;
			}
			form {
				display: flex;
				width: 100%;
				height: 100%;
				justify-content: center;
				align-items: center;
				flex-direction: column;
				z-index: 3;
			}
			input {
				display: flex;
				border-style: hidden;
				border-radius: 2px;
				margin-bottom: 15px;
			}
		</style>
	</head>
	<body>
		<div class="overlay">
		<div class="back">
			<form method="POST">
				<input type="text" placeholder="Username" name="username"/>
				<input type="password" placeholder="Password" name="password"/>
				<input type="submit" value="Submit" name="submit"/>
			</form>
		</div>
		</div>
	</body>
</html>