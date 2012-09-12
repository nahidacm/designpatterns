<?php

require_once 'system/system.php';
require_once 'process/process.php';
require_once 'io/io.php';

/* Facade */
interface iOS {

    function boot();

    function shutDown();

    function runProcess();

    function killProcess();

    function inputFromDevice($deviceID);

    function outputToDevice($deviceID);
}

class OS implements iOS {

    function boot() {
        System::boot();
    }

    function shutDown() {
        System::shutdown();
    }

    function runProcess() {
        $process = new Process;
        $process->run();
    }

    function killProcess() {
        $process = new Process;
        $process->kill();
    }

    function inputFromDevice($deviceID) {
        IO::inputFromDevice($deviceID);
    }

    function outputToDevice($deviceID) {
        IO::outputToDevice($deviceID);
    }

}