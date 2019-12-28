<?php	
	$users = [[   'login'	=> 'admin',
			   'password'	=> 'admin',
			     'access' 	=> 1
			  ]];
	file_put_contents('users.txt', serialize($users));
?>