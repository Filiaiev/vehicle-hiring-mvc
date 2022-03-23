<?php
    require_once "../dao/dayTripDAO.php";
    require_once "../dao/contactDetailsDAO.php";

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
                $this->dayTrip = DayTripDAO::getInstance()->getDayTripById($value);                
            }else if($name == 'contactDetailsId') {
                $this->contactDetails = ContactDetailsDAO::getInstance()->getContactDetailsById($value);
            }else {
                $this->$name = $value;
            }
        }

        function __toString() {
            return "Ticket ID: $this->ticketId, Purchase date: $this->purchaseDate,
                    Day trip [$this->dayTrip], Contact details [$this->contactDetails]";
        }
    }
?>