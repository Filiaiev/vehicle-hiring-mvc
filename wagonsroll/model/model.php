<?php
    class Model {
        private $modelId;
        private $modelName;
        private $brand;
        private $vehicleType;
    
        function __get($name) {
            return $this->$name;
        }
    
        function __set($name, $value) {
            if($name == 'brandId') {
                // Fetch brand with given brandId in $value from DB
                // (brandDAO needed)
            } else if($name == 'vehicleTypeId') {
                // Fetch vehicleType with given vehicleTypeId in $value from DB
                // (vehicleTypeDAO needed)
            } else {
                $this->$name = $value;
            }
        }
    }
?>