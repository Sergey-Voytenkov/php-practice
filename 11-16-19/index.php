<!DOCTYPE html>
<html>
	<head>
		<title>PHP Practice</title>
		<link rel="stylesheet" type="text/css" href="css.css"/>
		<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css"/>
	</head>
	<body>
		<div class="main">
			<form method="post">
				<div class="fileinputs">
					<span><input type="text" placeholder="Type Document Name" name="readfile"/><?php?></span>
					<span>
						<button type="submit">
							<i class="fa fa-bicycle" aria-hidden="true"></i>
							Read
						</button>
					</span>
				</div>
				<textarea name="docread"><?php
						if(isset($_POST["readfile"])) {
							$file = $_POST["readfile"];
							if(file_exists($file)) {
								$handle = fopen($file, 'r');
								while(($buffer = fgets($handle)) !== false) {
									echo htmlspecialchars($buffer);
								}
							}
							else echo "File Not Found, Or Not Correct";
						}
					?></textarea>
			</form>
			<form method="post">
				<div class="fileinputs">
					<span><input type="text" placeholder="Type Document Name" name="writefile"/></span>
					<span><input type="submit" value="Write"/></span>
				</div>
				<textarea name="docwrite"><?php
						if(isset($_POST["writefile"])) {
							$file = $_POST["writefile"];
							$handle = fopen($file, 'w');
							fwrite($handle, $_POST["docwrite"]);
							fclose($handle);
						}
						if(isset($_POST["docwrite"])) echo $_POST["docwrite"];
				?></textarea>
			</form>
		</div>
		
	</body>
</html>