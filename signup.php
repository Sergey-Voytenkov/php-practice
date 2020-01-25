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
			.overlay {
				width: 100%;
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				background-color: black;
			}

		</style>
	</head>
	<body>
		<div class="overlay">
		<?php 
			if(isset($_POST['username']) & isset($_POST['password'])) {
				if(file_exists('users.txt')){
					$contents = file_get_contents('users.txt');
					$users = unserialize($contents);
					$users[] = ['login' => $_POST['username'], 'password' => $_POST['password'], 'access' => 0];
					$contents = serialize($users);
					file_put_contents('users.txt', $contents);
					echo '<p>New User was Successfully Created</p>';
				}
				else echo 'Sorry, the system is having maintanance. Please try again later.';
			}
		?>
		
		<form method="POST">
			<input type="text" name="username" placeholder="Type Your User Name Here"/>
			<input type="password" name="password" placeholder="Type Your Password Here">
			<input type="submit" value="Create">
		</form>
		
		
		
		</div>
	</body>
</html>