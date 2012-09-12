<?php
require_once 'os.php';

$os = new OS;

$os->boot();
$os->inputFromDevice(1);
$os->outputToDevice(2);
$os->runProcess();
$os->killProcess();
$os->shutDown();