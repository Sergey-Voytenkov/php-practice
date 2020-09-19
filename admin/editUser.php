<?php
	if(!isset($_COOKIE['userId'])) {
		header("HTTP/1.1 403 No access");
		header('Location: /signin.php');
		exit;
	} else {
		include '../user.php';		
		
		$userid = $_COOKIE['userId'];
		$current_user = User::find_by_id($userid);
		
		
		
		if(!$current_user) {
			// current_user == null
			header("HTTP/1.1 403 No access");
			exit;
		}
		
		if(!$current_user->admin) {		
			header("HTTP/1.1 403 No access");
			exit; 
		}
		 
	
		if((isset($_POST['make_admin']) || isset($_POST['remove_access'])) && isset($_POST['userId'])) {
			if(isset($_POST['make_admin'])) User::admin_change($_POST['userId'], 1);
			else User::admin_change($_POST['userId'], 0);
			
			//$user = User::find_by_id($_POST['userId']);
			//if(isset($_POST['make_admin'])) $user->admin_change(1);
			//else $user->admin_change(0);
			
			
			//$user = User::find_by_id($_POST['userId']);
			//$user->admin_change(isset($_POST['make_admin']));
		} 
		header('Location: index.php');	
    }
?>