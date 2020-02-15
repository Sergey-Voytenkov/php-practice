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
				opacity: 0.1;
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
				background-color: black;
				z-index: 1;
			}
			.back {
				position: absolute;
				width: 500px;
				height: 400px;
				background-color: white;
				z-index: 2;
				opacity: 1;
			}
			form {
				z-index: 3;
			}
		</style>
	</head>
	<body>
		<div class="overlay">
		
		<div class="back">
		<form method="POST">
			<input type="text" name="username" placeholder="Type Your User Name Here"/>
			<input type="password" name="password" placeholder="Type Your Password Here">
			<input type="submit" value="Create">
			
			<?php if (isset($error)) echo "<div class=\"error\">$error</div>"; ?>
		</form>
		</div>
		
		
		</div>
	</body>
</html>