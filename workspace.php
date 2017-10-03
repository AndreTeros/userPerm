<?php
use Core\CIBlock,
	Core\User\CUser;

$u = new CUser();
$t = new CIBlock();

$t->setUser($u);

$t->setCode("gg");


$t->getCode();

print_r($t);