<?php 
include_once __DIR__. '/../vendor/autoload.php';

$classLoader = new \Composer\Autoload\ClassLoader();
#$classLoader->addPsr4("tests\unit\\", __DIR__, true);
$classLoader->addPsr4("src\\", __DIR__ . '/../src/', true);
$classLoader->addPsr4("tests\\", __DIR__ . '/../tests/', true);
$classLoader->register();
