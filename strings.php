<?php
$s1 = 'My error #1.';
$s2 = 'My error #2.';
$s3 = 'My error #3.';

$res = array();

$res[] = $s1;
$res[] = $s2;
$res[] = $s3;

$res2 = implode(' ', $res);

var_dump($res);
echo '<hr>';
var_dump($res2);



?>