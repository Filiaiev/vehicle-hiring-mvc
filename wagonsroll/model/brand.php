<?php
    class Brand {
        private $brandId;
        private $brandName;

        function __get($name) {
            return $this->$name;
        }

        function __set($name, $value) {
            $this->$name = $value;
        }

        function __toString() {
            return "Brand Id: $this->brandId, Brand Name: $this->brandName ";
        }
    }
?>