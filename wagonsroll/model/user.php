<?php
    class User {
        private $userLogin;
        private $pass;
        private $role;

        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value)
        {
            $this->$name = $value;
        }
    }
?>