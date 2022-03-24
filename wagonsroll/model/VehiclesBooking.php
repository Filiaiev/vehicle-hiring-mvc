<?php

    require_once "../dao/contactDetailsDAO.php";

    class VehiclesBooking {
	private $vehiclesBookingId;
        private $bookingDateTime;
        private $totalCost;
        private $contactDetails;

        function __get($name) {
            return $this->$name;
        }
    
        function __set($name, $value) {
            if($name == 'contactDetailsId') {
                $this->contactDetails = ContactDetailsDAO::getInstance()->getContactDetailsById($value);
            } else {
                $this->$name = $value;
            }
        }

        function __toString() {
            return "ID: $this->$vehiclesBookingId, BookingDateTime: $this->date, 
                    TotalCost: $this->$totalCost, Contact details [$this->contactDetails]";
        }
    }
?>