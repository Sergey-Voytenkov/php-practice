<html>
    <body>
		<?php
			$filename = file_get_contents('users.txt');
			$users = unserialize($filename);
		?>
		<table border="1">
			<tr>
				<th>Username</th>
				<th>Access</th>
				<th>Password</th>
			</tr>
			<?php
				foreach($users as $user) {
					echo '<tr>';
					echo '<td>' . $user['login'] . '</td>';
					echo '<td>' . $user['access'] . '</td>';
					echo '<td>' . $user['password'] . '</td>';
					echo '</tr>';
				}
				
				
				/*foreach($users as $user) {
					echo '<tr>';
					foreach($user as $key=>$value)
						echo '<td>' . $key . '>>' . $value . '</td>';
					echo '</tr>';
				}*/
				
				
				
				
				
				$person = [
					'first_name' => '...',
					'last_name' => '...',
					'middle_name' => '...',
					'email' => '...',
					'dob' => '...',
					'height' => '...',
					'eye-color' => ''
				]
				
				$people($peron1, $person2)
				
				
				$person2['height'] = "5'8/""
			?>
		</table>
        
    </body>
</html>