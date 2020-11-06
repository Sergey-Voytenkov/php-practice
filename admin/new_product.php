<?php
	include '../db/product.php';
	if (isset($_POST['product_name']) && isset($_POST['product_cost'])) {
		$name = $_POST['product_name'];
		$price = $_POST['product_cost'];
		$somename = 'pr'.md5(time()).".jpg";
		var_dump($somename);
		copy($_FILES['product_image']['tmp_name'], "../images/products/$somename");
		
		Product::addProduct($name, $price, $somename);
	}
?><html>
	<head>
		<link rel="stylesheet" href="new_product_style.css">
	</head>
	<body>
		<div id="main">
			<a href="index.php" id="back">Back</a>

			<form method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col1"><label for="product_name">Name:</label></div>
					<div class="col2"><input type='text' id="product_name" name="product_name"></div>
				</div>
				<div class="row">
					<div class="col1"><label for="product_cost">Cost:</label></div>
					<div class="col2"><input type='text' id="product_cost" name="product_cost"></div>
				</div>
				<div class="row">
					<div class="col1"></div>
					<div class="col2"><input type='file' id="file" name="product_image"></input></div>
				</div>
				<div id="submit_row">
					<div class="col1"></div>
					<div class="col2"><input type="submit" id="submit"></div>
				</div>
			</form>
		</div>
	</body>
</html>