<?php
	
	class User {
		function find($name) {
			$command = "select * from users where name='$name'";
			$users = mysqli_query($GLOBALS['db'], $command);
			if ($users) {
				return true;
			} else return false;
		}
	}
?>