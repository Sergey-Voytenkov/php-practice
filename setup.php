<?php	
	$users = [['admin', 'admin', 1]];
	file_put_contents('users.txt', serialize($users));
?>