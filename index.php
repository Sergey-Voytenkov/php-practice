<?php 
	include 'db.php';
	
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
					if ($connection) {
						$data = mysqli_query($connection, 'select * from users');
					}
					while ($row = mysqli_fetch_assoc($data)) {
                        echo"<tr>";
                        foreach ($row as $collumn) echo "<td>$collumn</td>";
                        echo"</tr>";
                    }

                    mysqli_close($connection);
				?>
			</table>
			<div>
				<a href="signout.php" class="signout"><button type=button>Sign Out</button></a>
			</div>
		</div>
    <body>
		
    </body>
</html>
