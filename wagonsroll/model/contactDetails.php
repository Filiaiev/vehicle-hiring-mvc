<?php
    require_once "../dao/addressDAO.php";

    class ContactDetails {
        private $contactDetailsId;
        private $firstName;
        private $familyName;
        private $mobile;
        private $address;
        private $email;
     
        function __construct($parameters = array()) {
            foreach($parameters as $key => $value) {
                $this->$key = $value;
            }
        }

        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value)
        {
            if($name == 'addressId') {
                // Fetch address with given addressId in $value from DB 
                $this->address = AddressDAO::getInstance()->getAddressById($value);
            }else {
                $this->$name = $value;
            }
        }

        function __toString() {
            return "ID: $this->contactDetailsId, First name: $this->firstName, Family name: $this->familyName, 
                    Mobile: $this->mobile, Address [$this->address], Email: $this->email";
        }
    }
?>