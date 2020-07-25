<!DOCTYPE html>
<html>
	<head>
		<style>
			th, td, table {
				border: 1px solid black;
			}
		</style>
	</head>
	<body>
		<?php
		$ip = 'localhost';
		$user = 'god';
		$password = '904325sv';
		
		$database = mysqli_connect($ip, $user, $password, 'animals');
		if ($database) {
			$data = mysqli_query($database, 'select * from animals');
			
		?>	
		<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Age</th>
				</tr>
			</thead>
			<tbody>
				<?php
				
				while ($row = mysqli_fetch_assoc($data)) {
					echo "<tr>";
					echo '<td>' . $row['id'] . '</td>';
					echo '<td>' . $row['name'] . '</td>';
					echo '<td>' . $row['age'] . '</td>';
					echo "</tr>";
				}
				
				?>
			</tbody>
		</table>
        <?php
		    mysqli_close($database);		
		} else {
			echo '<h1>Could not connect to the database. Try again later.</h1>';
		}
		?>
	</body>
</html>