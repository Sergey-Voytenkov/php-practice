<?php	
	include 'db.php';
	$res_1 = mysqli_query($db, 'create table users(
		id integer auto_increment,
		name char(100) not null,
		password char(225) not null,
		email char(225) not null,
		admin boolean default false,
		PRIMARY key(id)
	)');
	$res_2 = mysqli_query($db, 'create table products(
		id auto increment,
		name string,
		price float,
		image string,
		PRIMARY key(id)
	)')
	if ($res_1) {
		echo "Table users has been created.\n";
		mysqli_query($db, "create unique index unique_email on users(email);");
		
		$admin_password = md5('12345678');
		$numrec = mysqli_query($db, "insert into users(name, password, email, admin) value('Sergey', '$admin_password', 'sergey101.eco@gmail.com', 1)");
		if ($numrec > 0)
			echo "Number of users created $numrec";
		else echo 'Failed to create USER.';
	};
	if ($res_2) {
		echo 'Table Products Created';
	}
	mysqli_close($db);
	
?>