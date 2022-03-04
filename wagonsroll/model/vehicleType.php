<?php
    class VehicleType {
        private $vehicleTypeId;
        private $typeName;
        private $licenseType;
    
        function __get($name) {
            return $this->$name;
        }
    
        function __set($name, $value) {
            if($name == 'licenseTypeId') {
                // Fetch licenseType with given licenseTypeId in $value from DB
                // (licenseTypesDAO needed)
            } else {
                $this->$name = $value;
            }
        }
    }
?>