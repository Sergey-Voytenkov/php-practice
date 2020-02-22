<?php
	if (isset($_COOKIE['username'])) {
		header('Location: index.php'); 
		exit;
	}

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
				background: rgba(255,255, 255,0.8);
				z-index:1;
			}
			.back {
				display: flex;
				position: aboslute;
				width: 400px;
				height: 250px;
				background: rgba(204,230,255,0.25);
				/*border-radius: 100px;*/
				/*background-color: #cce6ff;*/
				border: 1px solid #66ccff;
				border-radius: 25px;
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