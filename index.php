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
						<button name="command" value="new" type="submit">
							<i class="fa fa-file-o" aria-hidden="true"></i>
						</button>
						<button name="command" value="open" type="submit">
							<i class="fa fa-file-text" aria-hidden="true"></i>
						</button>
						<button name="command" value="save" type="submit">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
						</button>
					</span>
				</div>
				<textarea name="docread"><?php				
						if (isset($_POST['command'])) {
							if ($_POST['command']) {
								//do something on New button pressed
								if(isset($_POST["command" == 'new'])) {
									$filename = $_POST["docread"];
									$handle = fopen($filename, 'w');
									fwrite($handle, $_POST["docread"]);
									fclose($handle);
								}
							} else if ($_POST['command'] == 'open') {
								//do something on Open button pressed
							} else {
								//do something on any other button (which is save) button pressed
							}
						}
				
						if(isset($_POST["readfile"])) {
							$file = $_POST["readfile"];
							if(file_exists($file)) {
								echo htmlspecialchars(file_get_contents($file));
							}
							else echo "File Not Found, Or Not Correct";
						}
					?></textarea>
			</form>
		</div>
		
	</body>
</html>
