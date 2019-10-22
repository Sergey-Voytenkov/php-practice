<html>
	<body>
		<?php 
			if(isset($_POST["fchecker"])) {
				$filename = $_POST["fchecker"];
				if (file_exists($filename)) {						
					$handle = fopen($filename, 'r');
					while ($buffer = (fgets($handle)) !== false) {
						echo htmlspecialchars($buffer);
					}
					
					fclose($handle);	
						
				} else {
					echo "The file $filename does not exist<br>";
				}
			}
		?>
	</body>
</html>

