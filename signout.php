<?php
	setcookie('userId', '', time() -5200);
	header('Location: signin.php');
	exit;
?>