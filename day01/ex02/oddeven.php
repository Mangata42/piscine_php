#!/usr/bin/php
<?php
	while (1)
	{
		$handle = fopen("php://stdin", "r");
		echo "Entrez un nombre: ";
		$line = fgets($handle);
		if (ord($line) == 0x0)
		{
			exit();
			fclose($handle);
		}
		$line = trim($line);
		if (is_numeric($line) == false)
			echo "'".$line."'"." n'est pas un chiffre\n";
		else
			if (($line % 2) == 0)
				echo "Le chiffre ".$line." est Pair\n";
			else
				echo "Le chiffre ".$line." est Impair\n";
	}
?>