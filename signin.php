<?php
	include 'db/user.php';
	if (isset($_COOKIE['userId'])) {
		header('Location: index.php'); 
		exit;
	}
	$errors = Array();
	if(isset($_POST['username']) && strlen($_POST['username']) < 1) $errors[]= "Please Input Username. ";
	if(isset($_POST['password']) && strlen($_POST['password']) < 8) $errors[]= "The Password must be 8 or more characters. ";
	
	if(count($errors) == 0 && isset($_POST['username'], $_POST['password'])) {
		$signin_name = $_POST['username'];
		$signin_password = $_POST['password'];
		$user = User::find_by_name_and_password($signin_name, $signin_password);
		if ($user) {
			setcookie('userId', $user->id, time()+60*60, "/");
			if($user->admin == 1) header('Location: admin/users.php');
			else header('Location: index.php');
			exit;
		}
		$errors[]= 'User not found';
	} 
	$error = implode('<br>', $errors);
	
?><!DOCTYPE html>
<html>
	<head>
		<title>My Signin</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="signin_overlay">
			<div class="back">
				<form method="POST">
					<input type="text" placeholder="Username" name="username"/>
					<input type="password" placeholder="Password" name="password"/>
					<input type="submit" value="Submit" name="submit"/>
					<?php if (isset($error)) echo "<div class=\"error\">$error</div>"; ?>
				</form>
			</div>
		</div>
	</body>
</html>