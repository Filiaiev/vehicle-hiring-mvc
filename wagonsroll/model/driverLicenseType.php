<?php
    class DriverLicenseType {
        private $licenseTypeId;
        private $licenseTypeName;

        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value) {
            $this->$name = $value;
        }
    }
?>