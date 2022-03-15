<?php
    require_once "../model/database.php";
    require_once "../model/driverLicenseType.php";

    class DriverLicenseTypeDAO {
        private static $instance = null;
        
        private function __construct() {
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new DriverLicenseTypeDAO();
            }               
            return self::$instance;         
        } 

        function getAllDriverLicenseTypes() {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->query("SELECT * FROM DriverLicenseType");
            $st->execute();

            return $st->fetchAll(PDO::FETCH_CLASS, "DriverLicenseType");
        }

        function getDriverLicenseTypeById($id) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM DriverLicenseType WHERE licenseTypeId = ?");
            $st->execute([$id]);

            return $st->fetchObject("DriverLicenseType");
        }
    }
?>