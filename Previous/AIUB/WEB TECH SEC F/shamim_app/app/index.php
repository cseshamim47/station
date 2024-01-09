<?php
date_default_timezone_set("Asia/Dhaka");
//Configuration files
require 'config.php';
require 'fpdf181/fpdf.php';
//Library files
function __autoload($class){
	require LIBS . $class .".php";
}
$bootstrap = new Bootstrap();
$bootstrap->setErrorFile ("error.php");
$bootstrap->setControllerPath("/controllers");
$bootstrap->setModelPath("/models");
$bootstrap->init();