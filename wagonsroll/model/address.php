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

        function __toString() {
            return "AddressId: $this->addressId, Line1: $this->addressLine1, Line2: $this->addressLine2,
                    City: $this->city, County: $this->county, Postcode: $this->postcode";
        }
    }
?>