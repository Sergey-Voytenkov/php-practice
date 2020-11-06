<?php
	$ip = 'localhost';
	$username = 'god';
	$password = '904325sv';
	$db = mysqli_connect($ip, $username, $password, 'test') or die('Sorry, the system is having maintanance. Please try again later.');
	
	class Product {
		public $id;
		public $name;
		public $price;
		public $image;
		
		static function find_all() {
			$products = mysqli_query($GLOBALS['db'], 'select * from products');
			$array = [];
			while ($row = mysqli_fetch_assoc($products)) {
				$product = new Product;
				$product->id = $row['id'];
				$product->name = $row['name'];
				$product->price = $row['price'];
				$product->image = $row['image'];
				
				$array[] = $product;
			}
			return $array;
		}
		static function addProduct($name = null, $price = null, $image = null) {
			$query = "insert into products(name, price, image) values('{$name}', '{$price}', '{$image}')";
			mysqli_query($GLOBALS['db'], $query);
		}
	}
?>