<?php
	setcookie('userId', '', time() -520000);
	header('Location: signin.php');
	exit;
?>