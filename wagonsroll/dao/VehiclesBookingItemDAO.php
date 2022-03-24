<?php
    require_once "../model/database.php";
    require_once "../model/vehicle.php";

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

        function getVehiclesBookingItemById($id) {
            $dbInstance = Database::getInstance();
            $pdo = $dbInstance->getPDO();
            $st = $pdo->prepare("SELECT * FROM VehiclesBookingItem WHERE bookingDetailId = ?");
            $st->execute([$id]);

            return $st->fetchObject("VehiclesBookingItem");
        }

        function getVehiclesBookingItemsByBooking($vehiclesBookingId){
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM VehiclesBookingItem 
                                WHERE bookingId = ?");
            $st->execute([$vehiclesBookingId]);

            return $st->fetchAll(PDO::FETCH_CLASS, "VehiclesBookingItem")
        }
    }
?>