<?php
	if(!isset($_COOKIE['userId'])) {
		header("HTTP/1.1 403 No access");
		header('Location: /signin.php');
		exit;
	} else {
		include '../db.php';		
		
		$userid = $_COOKIE['userId'];
		$result = mysqli_query($connection, "select * from users where id=$userid");
		if($result) {
			$user = mysqli_fetch_assoc($result);
			if($user) {
				if($user['admin'] != 1) {
					header("HTTP/1.1 403 No access");
					exit; 
				} 
			}
		} 
	
		if((isset($_POST['make_admin']) || isset($_POST['remove_access'])) && isset($_POST['userId'])) {
			if(isset($_POST['make_admin'])) $cmd = "update users set admin=1 where id={$_POST['userId']}";
			else $cmd = "update users set admin=0 where id={$_POST['userId']}";
			mysqli_query($connection, $cmd);
		} 
		header('Location: index.php');	
    }
?>