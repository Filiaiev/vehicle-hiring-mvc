<?php 
    require_once "../model/database.php";
    require_once "../model/dayTrip.php";

    class DayTripDAO {
        private static $instance = null;
        
        private function __construct() {
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new DayTripDAO();
            }               
            return self::$instance;         
        }
        
        function getDayTripById($id) {
            $dbInstance = Database::getInstance();
            $pdo = $dbInstance->getPDO();
            $st = $pdo->prepare("SELECT * FROM DayTrip WHERE dayTripId = ?");
            $st->execute([$id]);

            return $st->fetchObject("DayTrip");
        }

        function getDayTripByDate($date) {
            $dbInstance = Database::getInstance();
            $pdo = $dbInstance->getPDO();
            $st = $pdo->prepare("SELECT * FROM DayTrip WHERE `date` = ?");
            $st->execute([$date]);

            return $st->fetchObject("DayTrip");
        }

        function getDayTripByPickUpLocation($location) {
            $dbInstance = Database::getInstance();
            $pdo = $dbInstance->getPDO();
            $st = $pdo->prepare("SELECT * FROM DayTrip WHERE pickupAddressId = ?");
            $st->execute([$location]);

            return $st->fetchObject("DayTrip");
        }

        function getDayTripByVenue($venue) {
            $dbInstance = Database::getInstance();
            $pdo = $dbInstance->getPDO();
            $st = $pdo->prepare("SELECT * FROM DayTrip WHERE venue = ?");
            $st->execute([$venue]);

            return $st->fetchObject("DayTrip");
        }

        function getDayTripByPrice($price) {
            $dbInstance = Database::getInstance();
            $pdo = $dbInstance->getPDO();
            $st = $pdo->prepare("SELECT * FROM DayTrip WHERE price = ?");
            $st->execute([$price]);

            return $st->fetchObject("DayTrip");
        }

        function getDayTripByMaxPassengersNum($passengersNum) {
            $dbInstance = Database::getInstance();
            $pdo = $dbInstance->getPDO();
            $st = $pdo->prepare("SELECT * FROM DayTrip WHERE maxPassengersNum = ?");
            $st->execute([$passengersNum]);

            return $st->fetchObject("DayTrip");
        }

        function getDayTripByPickupTime($pickupTime) {
            $dbInstance = Database::getInstance();
            $pdo = $dbInstance->getPDO();
            $st = $pdo->prepare("SELECT * FROM DayTrip WHERE pickupTime = ?");
            $st->execute([$pickupTime]);

            return $st->fetchObject("DayTrip");
        }

        function getDayTripByRerurnTime($returnTime) {
            $dbInstance = Database::getInstance();
            $pdo = $dbInstance->getPDO();
            $st = $pdo->prepare("SELECT * FROM DayTrip WHERE returnTime = ?");
            $st->execute([$returnTime]);

            return $st->fetchObject("DayTrip");
        }
    }

?>