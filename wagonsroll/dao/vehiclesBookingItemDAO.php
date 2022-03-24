<?php
    require_once "../model/database.php";

    class VehiclesBookingItemDAO {
        private static $instance = null;
        
        private function __construct() {
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new VehiclesBookingItemDAO();
            }               
            return self::$instance;         
        }
    
        function save(array $itemBookingDetails) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("INSERT INTO 
                                 VehiclesBookingItem(startDate, endDate, bookingId, regNum)
                                 VALUES(?, ?, ?, ?)");
            $st->execute($itemBookingDetails);
            return $pdo->lastInsertId();
        }
    }
?>