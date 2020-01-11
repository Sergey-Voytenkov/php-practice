<!DOCTYPE html>
<html>
	<head>
		<style>
			html, body {
				margin: 0;
				background-color: lightblue;
				}
			
			.form {
					display: flex;
					justify-content: center;
					flex-direction: column;
					
			}
			.span {
				width: 50%;
			}
			.input {
				display: flex;
				flex-direction: column;
			}
			.center {
				display: flex;
				background-color: white;
				border-radius: 25px;
				border: 1px black solid;
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
		<form method="POST" class='form'>
			<span class="center">
				<input class="input"type="text" name="username" placeholder="Type Your User Name Here"/>
				<input class="input" type="password" name="password" placeholder="Type Your Password Here">
				<input class="input"type="submit" value="Create">
			</span>
		</form>
	</body>
</html>