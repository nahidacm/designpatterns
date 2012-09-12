<?php

interface iProcess {

    public function run();

    public function kill();
}

class Process implements iProcess{
    function run() {
        echo 'Process running...<br/>';
    }
    function kill() {
        echo 'Closing process...<br/>';
    }
}