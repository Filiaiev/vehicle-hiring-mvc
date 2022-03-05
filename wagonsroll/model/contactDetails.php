<?php
    class ContactDetails {
        private $contactDetailsId;
        private $firstName;
        private $familyName;
        private $mobile;
        private $address;
        private $email;
     
        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value)
        {
            // TODO: Email?
            if($name == 'addressId') {
                // Fetch address with given addressId in $value from DB 
            }else {
                $this->$name = $value;
            }
        }
    }
?>