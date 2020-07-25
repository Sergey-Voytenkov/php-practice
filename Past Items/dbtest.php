<html>
	<head></head>
	<body>
	<?php
		$servername = "localhost";
		$username = "god";
		$password = "904325sv";
		
		$conn = mysqli_connect($servername, $username, $password);
		if ($conn) {
			echo 'Connected';
			mysqli_select_db($conn, 'animals') or die(' ' . mysqli_error($conn));
			
			
			$query = 'SELECT * FROM animals';
		    $result = mysqli_query($conn, $query);
			
			while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
			
					foreach ($row as $column) echo "<td>$column</td>";
					
					echo "</tr>";
			}
			mysqli_close($conn);
		} else {
			echo 'Could not connect';
			echo mysqli_connect_error();
		}
		
	?>
	</body>
</html>