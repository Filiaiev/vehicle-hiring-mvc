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
    }
?>