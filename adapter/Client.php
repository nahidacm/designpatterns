<?php

$trip_type = 'One Way';
$leaving_from = 'Dhaka';
$going_to = 'Chittagong';
$departure_date = '09/11/2012';
$return_date = '17/11/2012';
$passanger_type = 'Adult';
$quantity = 4;
$travel_class = 'Economy';
$airline = 'Airasia';

$reservation = new Reservation($trip_type,$leaving_from,$going_to,$departure_date,$return_date,$passanger_type,$quantity,$travel_class,$airline);

$reservation->makeReservation();