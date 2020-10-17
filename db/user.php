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
		
		function __construct($name = null, $password = null, $email = null, $admin = 0) {
			$this->name = $name;
			$this->password = md5($password);
			$this->email = $email;
			$this->admin = $admin;
		}
		public function create() {
			$query = "insert into users(name, password, email, admin) values('{$this->name}', '{$this->password}', '{$this->email}', '{$this->admin}')";
			$result = mysqli_query($GLOBALS['db'], $query);
			if ($result) {
				$this->id = mysqli_insert_id($GLOBALS['db']);
			} else {
				$this->id = null;
			}
			return $this->id;
		}
		
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
		static function find_by_name_and_password($name, $password) {
			$cryptedPassword = md5($password);
			$result = mysqli_query($GLOBALS['db'], "select * from users where name='$name' and password='$cryptedPassword'");
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
		static function admin_change($id, $bool) {
			if($bool) {
				$cmd = "update users set admin=1 where id={$id}"; 
				$result = mysqli_query($GLOBALS['db'], $cmd);
			}
			else {
				$cmd = "update users set admin=0 where id={$id}"; 
				$result = mysqli_query($GLOBALS['db'], $cmd);
			}
			return $result; 
			

		}
		
	}
	/* FINISH ADMIN/INDEX.PHP. Should contain 2 links, one for users, one for products. 
	Create new_product.php with a form. Must have feilds for name, cost, image file name. 
	Finsih admin/products page. Add 2 links aobut the grid, one directs you back to admin index. The other to new_product page. See screenshot on phone.
	Add Css to make it look better. */
?>