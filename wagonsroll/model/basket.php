<?php
    class Basket {
        private $items;

        function __construct()
        {
            // This will be the map structure (key - value)
            // holding booking item and quantity
            $items = array();
        }

        function __get($name) {
            return $this->$name;
        }
    }
?>