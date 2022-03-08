<?php
    require_once "../dao/brandDAO.php";
    require_once "../dao/vehicleTypeDAO.php";

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
                $this->brand = BrandDAO::getInstance()->getBrandById($value);
            } else if($name == 'vehicleTypeId') {
                $this->vehicleType = VehicleTypeDAO::getInstance()->getVehicleTypeById($value);
            } else {
                $this->$name = $value;
            }
        }

        function __toString() {
            return "Model Id: $this->modelId, Model Name: $this->modelName,
                    Brand [$this->brand], Vehicle Type [$this->vehicleType] ";
        }
    }
?>