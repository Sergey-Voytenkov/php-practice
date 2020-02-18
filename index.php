<?php 
	if(!isset($_COOKIE['username'])) header('Location: signin.php');
	
	if(isset($_POST['signout'])) {
		setcookie('username', '', time() -5200);
		header('Refresh: 0');
	}
?>	
<!DOCTYPE html>
<html>
	<head>
		<style>
			html, body {
				margin: 0;
				height: 100%;
			}
			body {
				background-image: url("background.jpg");
				background-size: cover;
			}
			.overlay {
				width: 100%;
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				background: rgba(0,0,0,0.1);
				position: absolute;
				flex-direction: column;
			}
			.table {
				background-color: white;
			}
			.signout {
				color: red;
				margin-top: 5px;
			}
		</style>
	</head>
    <body>
		<?php
			$filename = file_get_contents('users.txt');
			$users = unserialize($filename);
		?>
		<div class="overlay">
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
				<form method="POST">
					<input type='hidden' name='signout'/>
					<input type='submit' value="Sign Out" class="signout"/>
				</form>
			</div>
		</div>
    </body>
</html>