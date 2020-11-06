<?php 
	include 'db/product.php'; 
	
	if(!isset($_COOKIE['userId'])) {
		header('Location: signin.php');
		exit;
	}
?><!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head><div class="index_overlay">
			<table class="table" border="1" cellspacing="0" cellpadding="4">
				<tr>
					<th>Products</th>
					<th>Price</th>
				</tr>
				<?php
					$result = Product::find_all();
					foreach($result as $product) {
						echo '<tr>';
						echo '<td>' . $product->name . '</td>';
						echo '<td>' . $product->price . '</td>';
						echo '<td>' . "<img src='/images/products/$product->image' />" . '</td>';
					} 
				?>
			</table>
			<div>
				<a href="signout.php" class="signout"><button type=button>Sign Out</button></a>
			</div>
		</div>
    <body>
		
    </body>
</html>
