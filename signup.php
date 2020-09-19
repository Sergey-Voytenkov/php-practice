<?php 
	if(isset($_POST['username']) && isset($_POST['password'])) {
		if (strlen($_POST['password']) < 8) $error = 'Password must be at least 8 characters.';
		else {
			include 'user.php';
			$user = new User($_POST['username'], $_POST['password'], $_POST['email'], 0);
			if($user->create() == null) {
				$error = 'User was not created.';
				unset($user);
			} else {
				unset($user);
				header('Location: signin.php');
				exit;
			}
		}
	}
?><!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="signup_overlay">
			<div class="back">
				<form method="POST">
					<input type="text" name="username" placeholder="Username"/>
					<input type="password" name="password" placeholder="Password"/>
					<input type="email" name="email" placeholder="Email"/>
					<input type="submit" value="Create"/>
					
					<?php if (isset($error)) echo "<div class=\"error\">$error</div>"; ?>
				</form>
			</div>
		</div>
	</body>
</html>