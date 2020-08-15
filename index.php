<?php 
	include 'user.php'; 
	
	if(!isset($_COOKIE['userId'])) {
		header('Location: signin.php');
		exit;
	}
?><!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head><div class="index_overlay">
			<table class="table" border="1" cellspacing="0" cellpadding="4">
				<tr>
					<th>id</th>
					<th>Name</th>
					<th>Password</th>
					<th>email</th>
					<th>Admin</th>
				</tr>
				<?php
					$result = User::find_all();
					foreach($result as $user) {
						echo '<tr>';
						echo '<td>' . $user->id . '</td>';
						echo '<td>' . $user->name . '</td>';
						echo '<td>' . $user->password . '</td>';
						echo '<td>' . $user->email . '</td>';
						echo '<td>' . $user->admin . '</td>';
						echo '</tr>';
					} 
				?>
			</table>
			<div>
				<a href="signout.php" class="signout"><button type=button>Sign Out</button></a>
			</div>
		</div>
    <body>
		
    </body>
</html>
