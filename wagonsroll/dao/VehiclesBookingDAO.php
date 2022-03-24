<?php
    require_once "../model/database.php";
    require_once "../model/vehicle.php";

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

        function getVehiclesBookingById($id) {
            $dbInstance = Database::getInstance();
            $pdo = $dbInstance->getPDO();
            $st = $pdo->prepare("SELECT * FROM VehiclesBooking WHERE bookingId = ?");
            $st->execute([$id]);

            return $st->fetchObject("VehiclesBooking");
        }

        function getVehiclesBookingByUserEmail($email) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT vb.* FROM VehiclesBooking as vb
                                INNER JOIN ContactDetails as cd ON vb.contactDetailsId = cd.contactDetailsId 
                                WHERE cd.email = ?");
            $st->execute([$email]);

            return $st->fetchAll(PDO::FETCH_CLASS, "VehiclesBooking");
        
       
    }
?>