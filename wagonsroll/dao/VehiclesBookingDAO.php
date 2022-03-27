<?php
    require_once "../model/database.php";

    class VehiclesBookingDAO {
        private static $instance = null;
        
        private function __construct() {
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new VehiclesBookingDAO();
            }               
            return self::$instance;         
        }
    
        function save(array $bookingDetails) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("INSERT INTO 
                                 VehiclesBooking(totalCost, bookingDateTime, contactDetailsId)
                                 VALUES(?, NOW(), ?)");
            $st->execute($bookingDetails);
            return $pdo->lastInsertId();
        }
    }
?>