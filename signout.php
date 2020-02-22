<?php
	setcookie('username', '', time() -5200);
	header('Location: signin.php');
	exit;
?>