<?php

//Target
class Reservation {

    public $trip_type;
    public $leaving_from;
    public $going_to;
    public $departure_date;
    public $return_date;
    public $passanger_type;
    public $quantity;
    public $travel_class;
    
    public $adapter;

    public function __construct($trip_type, $leaving_from, $going_to, $departure_date, $return_date, $passanger_type, $quantity, $travel_class, $airline) {
        $this->trip_type = $trip_type;
        $this->leaving_from = $leaving_from;
        $this->going_to = $going_to;
        $this->departure_date = $departure_date;
        $this->return_date = $return_date;
        $this->passanger_type = $passanger_type;
        $this->quantity = $quantity;
        $this->travel_class = $travel_class;

        //deciding adapter, Adapter names are simply the {Airlinename}Adapter
        try {
            $this->adapter = new $airline . 'Adapter'; //DO NOT UNDER ESTIMATE THIS POWER OF PHP :-P (to the non PHP guys)
        } catch (Exception $exc) {
            echo 'Adapter Not Available Adapter names are simply the {Airlinename}Adapter';
            echo $exc->getTraceAsString();
        }
    }

    public function isAvailable() {

        $this->adapter->isAvailable(
                $this->trip_type, $this->leaving_from, $this->departure_date, $this->return_date, $this->passanger_type, $this->travel_class
        );
    }

    public function makeReservation() {
        if ($this->isAvailable()){
            $this->adapter->makeReservation($this->trip_type, $this->leaving_from, $this->departure_date, $this->return_date, $this->passanger_type, $this->travel_class);
            
            $this->doPayment();
        }
        else{
            return "Not Available";
        }
    }

    public function doPayment() {
        $this->adapter->doPayment();
    }

}
