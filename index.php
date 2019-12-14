<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<form method="POST">
			<input type="text" name="username" placeholder="Type Your User Name Here"/>
			<input type="password" name="password" placeholder="Type Your Password Here">
			<input type="submit" value="Create">
		</form>
		<?php 
			if(isset($_POST['username']) & isset($_POST['password'])) {
				$arr = [$_POST['username'], $_POST['password']];
				print_r($arr);
				
				$contents = serialize($arr);
				$file = 'users.txt';
				file_put_contents($file, $contents);
				
				print_r('<br/>' . $contents);
			}
		?>
	</body>
</html>