<?php	
	include 'db.php';
	$res = mysqli_query($connection, 'create table users(
		id integer auto_increment,
		name char(100),
		password char(225),
		email char(225),
		admin boolean default false,
		PRIMARY key(id)
	)');
	if ($res) {
		echo "Table users has been created.\n";
		$admin_password = md5('12345678');
		$numrec = mysqli_query($connection, "insert into users(name, password, email, admin) value('Sergey', '$admin_password', 'sergey101.eco@gmail.com', 1)");
		if ($numrec > 0)
			echo "Number of users created $numrec";
		else echo 'Failed to create USER.';
	};
	mysqli_close($connection);
	
?>