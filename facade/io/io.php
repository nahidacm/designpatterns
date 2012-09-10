<?php

interface iIO {

    public function inputFromDevice($deviceID);

    public function outputToDevice($deviceID);
}

interface iMonitor {

    public function recieveDataFromGraphicsDevice();

    public function processGraphicsData();

    public function drawDataToMonitor();
}

interface iPrinter {

    public function recieveDataFromGraphicsDevice();

    public function processGraphicsData();

    public function sendDataToPrinter();
}

interface iKeyboard {

    public function recieveInput();

    public function processInput();
}

interface iMouse {

    public function recieveInput();

    public function processInput();
}

?>
