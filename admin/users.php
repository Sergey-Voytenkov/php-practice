<?php
	if(!isset($_COOKIE['userId'])) {
		header('Location: /signin.php');
		exit;
	} else {
		include '../db/user.php';
		
		
		$current_user = User::find_by_id($_COOKIE['userId']);
		if($current_user) {
			if(!$current_user->admin) {
				header('Location: /index.php');
				exit;
			} 
		} else {
			header('Location" /signin.php');
			exit;
		}			
	}
?><!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<div class="index_overlay">
			<?php
				echo "Hello {$current_user->name}";
			?>
			<table class="table" border="1" cellspacing="0" cellpadding="4">
				<tr>
					<th>id</th>
					<th>Name</th>
					<th>Password</th>
					<th>email</th>
					<th>Admin</th>
					<th>Action</th>
				</tr>
				<?php
					$users = User::find_all();
					
					foreach ($users as $user) {
						echo "<tr>";
						echo "<td>{$user->id}</td>";
						echo "<td>{$user->name}</td>";
						echo "<td>{$user->password}</td>";
						echo "<td>{$user->email}</td>";
						echo "<td>{$user->admin}</td>";
						echo "<td>";
						if($user->id != $current_user->id) {
							if($user->admin) {
							?>
								<form action="editUser.php" method="POST">
									<input type="hidden" name="userId" value="<?php echo $user->id; ?>"/>
									<input type="submit" name="remove_access" value="Remove Access"/>
								</form>
							<?php
							} else {
							?> 
								<form action="editUser.php" method="POST">
									<input type="hidden" name="userId" value="<?php echo $user->id; ?>"/>
									<input type="submit" name="make_admin" value="Make Admin"/>
								</form>
							<?php
							}
						} 
						echo "</td>";
                        echo"</tr>";
                    }
				?>
			</table>
			<div>
				<a href="../signout.php" class="signout"><button type=button>Sign Out</button></a>
			</div>
		</div>
	</body>
</html>