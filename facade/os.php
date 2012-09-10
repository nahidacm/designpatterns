<?php

interface iOS {

    function boot();

    function shutDown();

    function runProcess();

    function killProcess();

    function inputFromDevice($deviceID);

    function outputToDevice($deviceID);
}


?>
