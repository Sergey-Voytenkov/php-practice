<?php
	if(!isset($_COOKIE['userId'])) {
		header('Location: /signin.php');
		exit;
	} else {
		include '../db.php';
		
		
		$userid = $_COOKIE['userId'];
		$result = mysqli_query($db, "select * from users where id=$userid");
		if($result) {
			$user = mysqli_fetch_assoc($result);
			if($user) {
				if($user['admin'] != 1) {
					header('Location: /index.php');
					exit;
				} 
			}
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
				echo "Hello {$user['name']}";
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
					if ($db) {
						$data = mysqli_query($db, 'select * from users');
					}
					while ($row = mysqli_fetch_assoc(false)) {
                        echo"<tr>";
                        foreach ($row as $collumn) echo "<td>$collumn</td>";
						echo "<td>";
						if($row['id'] != 1) {
							if($row['admin'] == 1) {
							?>
								<form action="editUser.php" method="POST">
									<input type="hidden" name="userId" value="<?php echo $row['id']; ?>"/>
									<input type="submit" name="remove_access" value="Remove Access"/>
								</form>
							<?php
							} else {
							?> 
								<form action="editUser.php" method="POST">
									<input type="hidden" name="userId" value="<?php echo $row['id']; ?>"/>
									<input type="submit" name="make_admin" value="Make Admin"/>
								</form>
							<?php
							}
						} 
						echo "</td>";
                        echo"</tr>";
                    }

                    mysqli_close($db);
				?>
			</table>
			<div>
				<a href="../signout.php" class="signout"><button type=button>Sign Out</button></a>
			</div>
		</div>
	</body>
</html>