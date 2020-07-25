<?php
echo 'Here I start<br/>';
class Animal {
	function speak() {
		echo 'What a...?';
		echo '<br/>';
	}
}
echo 'Here I continue<br/>';
class Cat extends Animal {
	function speak() {
		echo 'Moew moew moew dogo scary';
		echo '<br/>';
	}
	function __destruct() {
		echo 'I hate water';
	}
} 
echo 'and still keep going<br/>';
class Dog extends Animal {
	function speak() {
		echo 'Bark Bark Bark Claws sharp';
		echo '<br/>';
	}
}
echo 'Almost done<br/>';

class Human extends Animal {}
$cat = new Cat;
$dog = new Dog;
$me = new Human;

$cat->speak();
$dog->speak();
unset($cat);
$me->speak();
?>