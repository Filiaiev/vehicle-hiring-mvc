<?php
    class Address {
        private $addressId;
        private $addressLine1;
        private $addressLine2;
        private $city;
        private $county;
        private $postocode;
        private $contactDetails;

        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value)
        {
            if($name == 'contactDetailsId') {
                // Fetch contactDetails with given contactDetailsId in $value from DB
                // (contactDetailsDAO needed)
            }else {
                $this->$name = $value;
            }
        }
    }
?>