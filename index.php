<?php
spl_autoload_register();

echo "<pre>";
try {
	include 'workspace.php';
} catch(Exception $e) {
	echo "\nError: ".$e->getMessage();
	echo "\nin file : ".$e->getFile();
	echo "\non line: ".$e->getLine()."\n";
}

echo "\n-------end-------\n</pre>";
