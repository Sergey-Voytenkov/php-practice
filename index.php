<?php
	setcookie("cookie", "He says its Cookie Time", 0, "/");			
?>
<html>
	<body>
		<?php
			if(isset($_COOKIE["cookie"])) {
				echo "Cookie was eaten";
			} else {
				echo "Cookie time passed";
			}
		?>
	</body>
</html>