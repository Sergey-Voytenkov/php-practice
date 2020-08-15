<?php
	include 'user.php';
	$result = User::find_by_name('Sergey');
	var_dump($result);
?>