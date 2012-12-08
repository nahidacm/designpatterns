<?php
//Adapter
class AirasiaAdapter{
    
    protected $_adaptee;
    public $v;

    public function __construct() {
        $this->_adaptee = new AirAsiaApi;
    }
    
    public function isAvailable() {

        $this->_adaptee->checkAvailability(
                $this->trip_type, $this->leaving_from, $this->departure_date, $this->return_date, $this->passanger_type, $this->travel_class
        );
    }

    public function makeReservation() {
        $this->_adaptee->reserve($this->trip_type, $this->leaving_from, $this->departure_date, $this->return_date, $this->passanger_type, $this->travel_class);
    }

    public function doPayment() {
        $total_bill = $this->_adaptee->getTotalBill();
        $this->_adaptee->billPay($total_bill);
    }

}

