<?php

interface iIO {

    public static function inputFromDevice($deviceID);

    public static function outputToDevice($deviceID);
}

interface iMonitor {

    public function recieveDataFromGraphicsDevice();

    public function processGraphicsData();

    public static function drawDataToMonitor();
}

interface iPrinter {

    public function recieveDataFromGraphicsDevice();

    public function processGraphicsData();

    public static function sendDataToPrinter();
}

interface iKeyboard {

    public static function recieveInput();

    public function processInput();
}

interface iMouse {

    public static function recieveInput();

    public function processInput();
}

/* Sub-system */
class IO implements iIO {

    public static function inputFromDevice($deviceID){
        if($deviceID == 1)
            Mouse::recieveInput ();
        if($deviceID == 2)
            Keyboard::recieveInput ();
    }

    public static function outputToDevice($deviceID){
        if($deviceID == 1)
            Monitor::drawDataToMonitor ();
        if($deviceID == 2)
            Printer::sendDataToPrinter ();
    }
}

class Monitor implements iMonitor{
    public function recieveDataFromGraphicsDevice(){
        echo 'Data From Graphics Card...<br/>';
    }

    public function processGraphicsData(){
        echo 'Processing Graphics Data...<br/>';
    }

    public static function drawDataToMonitor(){
        echo 'Drawing Data to Monito...<br/>';
    }
}

class Printer implements iPrinter{
    public function recieveDataFromGraphicsDevice(){
        echo 'Data From Graphics Card...<br/>';
    }

    public function processGraphicsData(){
        echo 'Process Graphics data...<br/>';
    }

    public static function sendDataToPrinter(){
        echo 'Printing Data...<br/>';
    }
}

class Keyboard implements iKeyboard {

    public static function recieveInput(){
        echo 'Data From Input...<br/>' ;
    }

    public function processInput(){
        echo 'Processing Data...<br/>';
    }
}

class Mouse implements iMouse {

    public static function recieveInput(){
        echo 'Data From Input...<br/>';
    }

    public function processInput(){
        echo 'Processing input data...<br/>';
    }
}