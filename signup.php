<?php 
	if(isset($_POST['username']) && isset($_POST['password'])) {
		if (strlen($_POST['password']) < 8) $error = 'Password must be at least 8 characters';
		else {
			include 'db.php';
			$name = $_POST['username'];
			$pssd = md5($_POST['password']);
			$email = $_POST['email'];
			$query = "insert into users(name, password, email) values('$name', '$pssd', '$email')";
			mysqli_query($db, $query);
			
			mysqli_close($db);
			header('Location: signin.php');
			exit;
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