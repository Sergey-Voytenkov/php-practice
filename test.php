<?php
	include 'db.php';

	include 'user.php';
	$user = new User;

	if ($user->find('Sergey34')) echo 'Found';
	else echo 'Not found';
?>