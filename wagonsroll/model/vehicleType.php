<?php
    require_once "../dao/driverLicenseTypeDAO.php";

    class VehicleType {
        private $vehicleTypeId;
        private $typeName;
        private $licenseType;
    
        function __get($name) {
            return $this->$name;
        }
    
        function __set($name, $value) {
            if($name == 'licenseTypeId') {
                $this->licenseType = DriverLicenseTypeDAO::getInstance()->getDriverLicenseTypeById($value);
            } else {
                $this->$name = $value;
            }
        }

        function __toString() {
            return "Vehicle Type Id: $this->vehicleTypeId, Type Name: $this->typeName, License Type [$this->licenseType] ";
        }
    }
?>