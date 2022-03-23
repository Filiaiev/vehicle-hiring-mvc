<?php
    require_once "../model/database.php";
    require_once "../model/vehicleType.php";

    class VehicleTypeDAO {
        private static $instance = null;
        
        private function __construct() {
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new VehicleTypeDAO();
            }               
            return self::$instance;         
        } 

        function getAllVehicleTypes() {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->query("SELECT * FROM VehicleType");
            $st->execute();

            return $st->fetchAll(PDO::FETCH_CLASS, "VehicleType");
        }

        function getVehicleTypeByName($name) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM VehicleType WHERE typeName = ?");
            $st->execute([$name]);

            return $st->fetchObject("VehicleType");
        }

        function getVehicleTypeById($id) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM VehicleType WHERE vehicleTypeId = ?");
            $st->execute([$id]);

            return $st->fetchObject("VehicleType");
        }
    }
?>