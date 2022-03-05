<?php
    class Address {
        private $addressId;
        private $addressLine1;
        private $addressLine2;
        private $city;
        private $county;
        private $postcode;

        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value)
        {
            $this->$name = $value;
        }
    }
?>