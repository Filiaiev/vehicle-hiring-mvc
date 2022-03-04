<?php
    class DayTrip {
        private $dayTripId;
        private $pickupLocation;
        private $venue;
        private $price;
        private $maxPassengersNum;
        private $date;
        private $pickupTime;
        private $returnTime;

        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value) {
           $this->$name = $value; 
        }
    }
?>