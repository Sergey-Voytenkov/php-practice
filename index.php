<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<?php 
			$vasya = 'He runs around like a waldling chickmunk.';
			$s = serialize($vasya);
			echo $vasya . '<br/>' . $s . '<br/>';
			
			$pi = 3.141592;
			$s = serialize($pi);
			echo $pi . '<br/>' . $s . '<br/>';
			
			$arr = ["Hello World 0-0", 1234567890, false];
			$s = serialize($arr);
			print_r($arr); 
			echo $s . '<br/>';
			
			$arr2 = unserialize($s);
			print_r($arr2);
		?>
	</body>
</html>