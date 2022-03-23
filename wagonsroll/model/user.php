<?php
    class User {
        private $roleId;
        private $email;
        private $pass;

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
            $this->$name = $value;
        }

        function __toString() {
            return "Role ID: $this->roleId, Email: $this->email, pass: $this->pass";
        }
    }
?>