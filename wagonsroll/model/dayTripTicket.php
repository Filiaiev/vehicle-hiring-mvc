<?php
    class DayTripTicket {
        private $ticketId;
        private $purchaseDate;
        private $dayTrip;
        private $contactDetails;

        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value)
        {
            if($name == 'dayTripId') {
                
            }else if($name == 'contactDetailsId') {
              
            }else {
                $this->$name = $value;
            }
        }
    }
?>