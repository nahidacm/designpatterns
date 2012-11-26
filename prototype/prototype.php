<?php

interface IClonable{
    public function copy();//alternate of clone, because clone itself is php keyword
}

class Car implements IClonable{
    protected $body;
    protected $wheel;
    protected $engine;
    public function __construct() {
        $this->body = new Body();
        $this->wheel = new Wheel();
        $this->engine = new Engine();
    }
    public function setBody(Body $body){
        $this->body = $body;
    }
    public function setWheel(Wheel $wheel){
        $this->wheel = $wheel;
    }
    public function setEngine(Engine $engine){
        $this->engine = $engine;
    }
    
    public function getBody(){
        return $this->body;
    }
    public function getWheel(){
        return $this->wheel;
    }
    public function getEngine(){
        return $this->engine;
    }
    
    public function copy() {
        $car = new Car;
        $car->setBody($this->getBody());
        $car->setWheel($this->getWheel());
        $car->setEngine($this->getEngine());
        
        return $car;
    }
}
class Body implements IClonable{
    protected $color;
    
    public function __construct() {
        $this->color = 'white';
    }
    public function setColor($color){
        $this->color = $color;
    }
    public function getColor(){
        return $this->color;
    }
    public function copy() {
        
        $body = new Body;
        $body->setColor($this->getColor());
        
        return $body;
    }
}

class Wheel implements IClonable{
    protected $size;
    public function __construct() {
        $this->size = 10;
    }

    public function setSize($size){
        $this->size = $size;
    }
    public function getSize(){
        return $this->size;
    }
    
    public function copy() {
        $wheel = new Wheel();
        $wheel->setSize($this->getSize());
        
        return $wheel;
    }
}

class Engine implements IClonable{
    protected $hp;
    public function __construct() {
        $this->hp = 150;
    }

    public function setHp($hp){
        $this->hp = $hp;
    }
    public function getHp(){
        return $this->hp;
    }
    
    public function copy() {
        $engine = new Engine();
        $engine->setHp($this->getHp());
        
        return $engine;
    }
}

$car = new Car();

$body = new Body();
$wheel = new Wheel();
$engine = new Engine();

$car->setBody($body);

$car2 = $car->copy();
$body2 = $body->copy();
$body2->setColor('Green');
$car2->setBody($body2);
$engine2 = $engine->copy();
$engine2->setHp(56);
$car2->setEngine($engine2);


var_dump($car);
var_dump($car2);
