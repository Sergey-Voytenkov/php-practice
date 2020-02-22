<?php 
	if(isset($_POST['username']) && isset($_POST['password'])) {
		if(file_exists('users.txt')){
			if (strlen($_POST['password']) < 8) $error = 'Password must be at least 8 characters';
			else {
				$contents = file_get_contents('users.txt');
				$users = unserialize($contents);
				$users[] = ['username' => $_POST['username'], 'password' => $_POST['password'], 'access' => 0];
				$contents = serialize($users);
				file_put_contents('users.txt', $contents);
				header('Location: signin.php');
				exit;
			}
		}
		else $error = 'Sorry, the system is having maintanance. Please try again later.';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			html, body {
				height: 100%;
				margin: 0;
			}
			body {
				background-image: url("background.jpg");
				background-size: cover;
			}
			.error {
				color: red;
			}
			.overlay {
				width: 100%;
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				background: rgba(0,0,0,0.1);
				z-index: 1;
			}
			.back {
				display: flex;
				position: absolute;
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
					<input type="text" name="username" placeholder="Username"/>
					<input type="password" name="password" placeholder="Password">
					<input type="submit" value="Create">
					
					<?php if (isset($error)) echo "<div class=\"error\">$error</div>"; ?>
				</form>
			</div>
		</div>
	</body>
</html>