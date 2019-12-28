<html>
    <body>
		<?php 
            $filename = file_get_contents('users.txt');
            $users = unserialize($filename);
          ?>
        <table>
            <tr>
				<td>Username</td>
				<td>Password</td>
				<td>Access</td>
			</tr>
			<?php 
				for($i=0; $i<count($users); ++$i) {
					$user = $users[$i];
					echo '<tr>';
					echo '<td>' . $user[0] . '</td>';
					echo '<td>' . $user[1] . '</td>';
					echo '<td>' . $user[2] . '</td>';
					echo '</tr>';
				}
			?>
        </table>
    </body>
</html>