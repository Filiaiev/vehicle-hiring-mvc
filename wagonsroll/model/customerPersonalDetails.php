<?php
    class CustomerPersonalDetails {
        private $customerId;
        private $birthDate;
        private $contactDetailsId;
        private $user;

        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value)
        {
            if($name == 'userLogin') {
                // Fetch user with given login in $value from DB (UserDAO needed)
            }else {
                $this->$name = $value;
            }
        }
    }
?>