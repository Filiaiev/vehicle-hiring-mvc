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

        function __toString() {
            return "License Type Id: $this->licenseTypeId, License Type Name: $this->licenseTypeName ";
        }
    }
?>