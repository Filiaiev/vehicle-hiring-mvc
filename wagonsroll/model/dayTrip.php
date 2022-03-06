<?php
    require_once "../dao/addressDAO.php";

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
                $this->pickupAddress = AddressDAO::getInstance()->getAddressById($value);
            }else {
                $this->$name = $value; 
            }
        }

        function __toString() {
            return "ID: $this->dayTripId, Pickup address [$this->pickupAddress], Venue: $this->venue, Price: $this->price, 
                    MaxPassengers: $this->maxPassengersNum, Date: $this->date, Pickup time: $this->pickupTime, 
                    Return time: $this->returnTime";
        }
    }
?>