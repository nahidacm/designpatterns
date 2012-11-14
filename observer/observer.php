<?php

interface IObserver {

    function onChanged($sender, $args);
}

interface IObservable {

    function addObserver($observer);

    function removeObserver($observer);

    function notifyObservers($price);
}
//Subject
class StockMarket implements IObservable {

    private $_observers = array();

    public function priceChange($price) {
        $this->notifyObservers($price);
    }

    public function addObserver($observer) {
        $this->_observers [] = $observer;
    }

    public function removeObserver($observer) {
        if (($key = array_search($this->_observers, $observer)) !== false) {
            unset($this->_observers[$key]);
        }
    }
    
    public function notifyObservers($price){
        foreach ($this->_observers as $obs)
            $obs->onChanged($this, $price);
    }

}

//Observers
class optimisticInvestor implements IObserver {

    public function onChanged($sender, $price) {
        if($price<0)
            echo 'Optimistic: Oh.. No, price is falling again.. let sell them all<br/>';
    }

}
class pessimisticInvestor implements IObserver {

    public function onChanged($sender, $price) {
        if($price<0)
            echo 'Pessmistic: Thinking about selling some stock<br/>';
    }

}

//Client
$ul = new StockMarket();

$ul->addObserver(new optimisticInvestor());
$ul->addObserver(new pessimisticInvestor());

$ul->priceChange(-1);
$ul->priceChange(1);
