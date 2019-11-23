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
					<span><input type="text"
								 placeholder="Type Document Name"
								 name="readfile"
								 value="<?php if(isset($_POST["readfile"])) echo $_POST["readfile"]; ?>"
						  />
						
					</span>
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
							if ($_POST['command'] == 'new') {
								//do something on New button pressed
								$filename = $_POST["readfile"];
								$handle = fopen($filename, 'w');
								fwrite($handle, $_POST["docread"]);
								fclose($handle);
								
							} else if ($_POST['command'] == 'open') {								
								//do something on Open button pressed
								$filename = $_POST['readfile'];
								if(file_exists($filename))
									echo htmlspecialchars(file_get_contents($filename));
								else echo "File Not Found, Or Not Correct";
								
							} else {
								//do something on any other button (which is save) button pressed
							}
						}
					?></textarea>
			</form>
		</div>
		
	</body>
</html>
