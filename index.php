<?php 
	if(!isset($_COOKIE['username'])) {
		header('Location: signin.php');
		exit;
	}
?>	
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
    <body>
		<?php
			$filename = file_get_contents('users.txt');
			$users = unserialize($filename);
		?>
		<div class="index_overlay">
			<table class="table" border="1" cellspacing="0" cellpadding="4">
				<tr>
					<th>Username</th>
					<th>Access</th>
					<th>Password</th>
				</tr>
				<?php
					foreach($users as $user) {
						echo '<tr>';
						echo '<td>' . $user['username'] . '</td>';
						echo '<td>' . $user['access'] . '</td>';
						echo '<td>' . $user['password'] . '</td>';
						echo '</tr>';
					}
				?>
			</table>
			<div>
				<a href="signout.php" class="signout"><button type=button>Sign Out</button></a>
			</div>
		</div>
    </body>
</html>