<?php

interface iSystem {

    public static function boot();

    public static function shutdown();
}

class System implements iSystem{
    static function boot() {
        echo 'Starting Up System...<br/>';
    }
    static function shutdown() {
        echo 'Shuting down...<br/>';
    }
}