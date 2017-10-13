#!/usr/bin/php
<?php

	$array = ["login"=>"admin", "passwd"=>"admin"];
	$data = serialize($array);
	file_put_contents("test.txt", $data);
	$string = unserialize(file_get_contents("test.txt"));
	print_r($array);
?>