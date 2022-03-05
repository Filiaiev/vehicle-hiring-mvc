<?php
    class CustomerPersonalDetails {
        private $customerId;
        private $birthDate;
        private $contactDetails;
        private $user;

        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value)
        {
            if($name == 'userLogin') {
                // Fetch user with given login in $value from DB (UserDAO needed)
            }else if($name == 'contactDetailsId') {
                // Fetch contactDetails with given login in $value from DB
                // (ContactDetailsDAO needed)
            }else {
                $this->$name = $value;
            }
        }
    }
?>