<?php
    class Model {
        private $regNum;
        private $model;
        private $dailyRate;
        private $imageUrl;
        private $maxPassengerNumber;
        private $postDate;
    
        function __get($name) {
            return $this->$name;
        }
    
        function __set($name, $value) {
            if($name == 'modelId') {
                // Fetch model with given modelId in $value from DB
                // (modelDAO needed)
            } else {
                $this->$name = $value;
            }
        }
    }
?>