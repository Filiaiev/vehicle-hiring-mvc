<?php
    class User {
        private $email;
        private $pass;
        private $roleName;

        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value)
        {
            $this->$name = $value;
        }

        function __toString() {
            return "Email: $this->email, pass: $this->pass, role: $this->roleName";
        }
    }
?>