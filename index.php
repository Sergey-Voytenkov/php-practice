<!DOCTYPE html>
<html>
	<head>
	
	</head>
	
	<body>
		<form action="index.php" method="post">
			<textarea rows="40" cols="100" name="content"><?php
				if (isset($_POST['content'])) 
					echo $_POST['content']; 
			?></textarea>
			<br/>
			<input type="text" name="filename" value="<?php
				if (isset($_POST["filename"]))
					echo $_POST["filename"];
			?>"/>
			<input type="submit"/>
		</form>
		<?php
			if (isset($_POST["filename"])) {
				$file = $_POST["filename"];
				$handle = fopen($file, 'w');
				fwrite ($handle , $_POST["content"]);
				fclose($handle);

			} 
		?>
	</body>
</html>