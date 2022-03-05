<?php
    class User {
        private $email;
        private $pass;
        private $role;

        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value)
        {
            if($name == 'roleId') {
                // Fetch role with given roleId in $value from DB
                // (roleDAO needed)
            }else {
                $this->$name = $value;
            }
        }
    }
?>