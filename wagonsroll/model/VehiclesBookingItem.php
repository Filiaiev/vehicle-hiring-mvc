<?php

require_once "../dao/vehicleDAO.php";
require_once "../dao/vehiclesBookingDAO.php";

    class VehiclesBooking {
        private $bookingDetailId;
        private $startDate;
        private $endDate;
        private $vehiclesBooking;
        private $regNum;
    
        function __get($name) {
            return $this->$name;
        }
    
        function __set($name, $value) {
            if($name == 'bookingId') {
                $this->vehiclesBooking = VehiclesBookingItemDAO::getInstance()->getVehiclesBookingById($value);
            } else if($name == 'regNum') {
                $this->regNum = VehicleDAO::getInstance()->getVehicleByRegNum($value);
            } else {
                $this->$name = $value;
            }
        }

        function __toString() {
            return "ID: $this->$bookingDetailId, StartDate: $this->$startDate, EndDate: $this->$endDate,
                    VehiclesBooking [$this->$vehiclesBooking], RegNum [$this->$regNum]";
        }
    }
?>