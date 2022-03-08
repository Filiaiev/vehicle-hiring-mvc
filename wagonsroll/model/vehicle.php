<?php
    require_once "../dao/modelDAO.php";

    class Vehicle {
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
                $this->model = ModelDAO::getInstance()->getModelById($value);
            } else {
                $this->$name = $value;
            }
        }

        function __toString() {
            return "Registration Number: $this->regNum, Model: $this->model, Daily Rate [$this->dailyRate], Image Url [$this->imageUrl],
                    Max Passenger Number [$this->maxPassengerNumber], Posted Date [$this->postDate] ";
        }
    }
?>