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
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="signup_overlay">
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