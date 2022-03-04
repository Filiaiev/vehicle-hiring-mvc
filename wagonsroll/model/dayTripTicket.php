<?php
    class DayTripTicket {
        private $ticketId;
        private $purchaseDate;
        private $dayTrip;
        private $customer;

        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value)
        {
            if($name == 'dayTripId') {
                
            }else if($name == 'customerId') {
              
            }else {
                $this->$name = $value;
            }
        }
    }
?>