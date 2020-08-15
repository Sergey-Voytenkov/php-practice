<?php
	$ip = 'localhost';
	$username = 'god';
	$password = '904325sv';
	$db = mysqli_connect($ip, $username, $password, 'test') or die('Sorry, the system is having maintanance. Please try again later.');
	
  	class User {
		public $id;
		public $name;
		public $password;
		public $email;
		public $admin;
		
		/* static function find_by_id($id) {
			$result = mysqli_query($GLOBALS['db'], "select * from users where id=$id");
			if($result == false) return null;
			while ($row = mysqli_fetch_assoc($result)) {
				var_dump($row);
				if(isset($row['id'])) $this->id = $row['id'];
				if(isset($row['name'])) $this->name = $row['name'];
				if(isset($row['password'])) $this->password = $row['password'];
				if(isset($row['email'])) $this->email = $row['email'];
				if(isset($row['admin'])) $this->admin = $row['admin'];
				echo $this->name;
				echo $this->password;
			}
		}*/
		static function find_all() {
			$users = [];
			
			$result = mysqli_query($GLOBALS['db'], "select * from users");
			if($result == false) return $users;

			while ($row = mysqli_fetch_assoc($result)) {
				$newUser = new User;
				$newUser->id = $row['id'];
				$newUser->name = $row['name'];
				$newUser->password = $row['password'];
				$newUser->email = $row['email'];
				$newUser->admin = $row['admin'];
				
				$users[] = $newUser; 
			}
			
			return $users;
		}
		static function find_by_id($id) {
			$result = mysqli_query($GLOBALS['db'], "select * from users where id=$id");
			if($result == false) return null;
			$row = mysqli_fetch_assoc($result);
			if($row == null) return null;
			
			$newUser = new User;
			$newUser->id = $row['id'];
			$newUser->name = $row['name'];
			$newUser->password = $row['password'];
			$newUser->email = $row['email'];
			$newUser->admin = $row['admin'];
			return $newUser;
		}
		static function find_by_name($name) {
			$result = mysqli_query($GLOBALS['db'], "select * from users where name='$name'");
			if($result == false) return null;
			$row = mysqli_fetch_assoc($result);
			if($row == null) return null;
			
			$newUser = new User;
			$newUser->id = $row['id'];
			$newUser->name = $row['name'];
			$newUser->password = $row['password'];
			$newUser->email = $row['email'];
			$newUser->admin = $row['admin'];
			return $newUser;
		}
		static function find_by_email($email) {
			$result = mysqli_query($GLOBALS['db'], "select * from users where email='$email'");
			if($result == false) return null;
			$row = mysqli_fetch_assoc($result);
			if($row == null) return null;
			
			$newUser = new User;
			$newUser->id = $row['id'];
			$newUser->name = $row['name'];
			$newUser->password = $row['password'];
			$newUser->email = $row['email'];
			$newUser->admin = $row['admin'];
			return $newUser;
		}
		
	}#write function, find my name and password.
?>