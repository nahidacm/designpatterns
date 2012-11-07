<?php
//Adapter
class BalakaAdapter{
    
    protected $_adaptee;
    
    public function __construct() {
        $this->_adaptee = new BalakaApi;
    }

    public function isAvailable() {

        $sits = $this->_adaptee->getAvailableSits(
                $this->trip_type, $this->leaving_from, $this->departure_date, $this->return_date, $this->passanger_type, $this->travel_class
        );
        if($sits>0){
            return true;
        }else {
            return false;
        }
    }

    public function makeReservation() {
        $this->_adaptee->processReservation($this->trip_type, $this->leaving_from, $this->departure_date, $this->return_date, $this->passanger_type, $this->travel_class);
        $this->_adaptee->confirmReservation();
    }

    public function doPayment() {
        $fare = $this->_adaptee->calculateFare();
        $this->_adaptee->processCreditCard($card_info);
        $this->_adaptee->payFare($fare);
    }

}

