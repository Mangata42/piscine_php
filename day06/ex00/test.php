#!/usr/bin/php
<?php

class Exemple
{
	public $public_foo = 0;
	private $_private_foo = "hey";

	function __construct(array $kwargs)
	{
		print("Constructor called\n");
	}

	function __destruct()
	{
		print("Destructor called\n");
	}

	function bar()
	{
		print("Method bar called\n");
	}
}

$instance = new Exemple();

?>