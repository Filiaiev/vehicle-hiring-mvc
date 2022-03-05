<?php
    class DayTrip {
        private $dayTripId;
        private $pickupAddress;
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
            if($name == 'pickupAddressId') {
                // Fetch address with given pickupAddressId in $value from DB 
            }else {
                $this->$name = $value; 
            }
        }
    }
?>