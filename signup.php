<!DOCTYPE html>
<html>
	<head>
		<style>
			html, body {
				height: 100%;
				margin: 0;
				background-color: lightblue;
			}
			body {
				display: flex;
				justify-content: center;
				align-items: center;
				border: 1px solid green;
			}
			form {
				display:flex;
				height: 480px;
				width: 640px;
				border: 1px solid red;
				border-radius: 10px;
				background-color: yellow;
				flex-direction: column;
				align-items: center;
				
			}
		</style>
	</head>
	<body>
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
	</body>
</html>