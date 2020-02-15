<html>
	<head>
		<style>
			html, body {
				margin: 0;
				background-color: silver;
			}
			
			.table {
				margin-top: 20px;
				margin-left: 25px;
				background-color: white;
			}
			
		</style>
	</head>
    <body>
		<?php
			$filename = file_get_contents('users.txt');
			$users = unserialize($filename);
		?>
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
        
    </body>
</html>