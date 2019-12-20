<!DOCTYPE html>
<html>
	<body>
		<?php 
			if(isset($_POST['username']) & isset($_POST['password'])) {
				if(file_exists('users.txt')){
					$contents = file_get_contents('users.txt');
					$users = unserialize($contents);
					$users[] = [$_POST['username'], $_POST['password'], 0];
					$contents = serialize($users);
					file_put_contents('users.txt', $contents);
					echo '<p>New User was Successfully Created</p>';
				}
				else {
					$arr = [$_POST['username'], $_POST['password'], 1];
					$contents = serialize($arr);
					file_put_contents('users.txt', $contents);
					echo '<p>New Admin was Successfully Created</p>';
				}
			}
		?>
		<form method="POST">
			<input type="text" name="username" placeholder="Type Your User Name Here"/>
			<input type="password" name="password" placeholder="Type Your Password Here">
			<input type="submit" value="Create">
		</form>
	</body>
</html>