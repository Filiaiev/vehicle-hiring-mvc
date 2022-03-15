<?php
    require_once "../model/database.php";
    require_once "../model/vehicle.php";

    class VehicleDAO {
        private static $instance = null;
        
        private function __construct() {
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new VehicleDAO();
            }               
            return self::$instance;         
        } 

        function getVehicleByRegNum($regNum) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Vehicle WHERE regNum = ?");
            $st->execute([$regNum]);

            return $st->fetchObject("Vehicle");
        }

        function getAllVehicles() {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Vehicle");
            $st->execute();

            return $st->fetchAll(PDO::FETCH_CLASS, "Vehicle");
        }

        function getVehiclesByPostDate($postDate) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Vehicle WHERE postDate = ?");
            $st->execute([$postDate]);

            return $st->fetchAll(PDO::FETCH_CLASS, "Vehicle");
        }

        function getVehiclesByMaxPassengerNumber($maxPassengerNumber) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Vehicle WHERE maxPassengerNumber <= ?");
            $st->execute([$maxPassengerNumber]);

            return $st->fetchAll(PDO::FETCH_CLASS, "Vehicle");
        }

        function getVehiclesByMaxDailyRate($maxDailyRate) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Vehicle WHERE dailyRate <= ?");
            $st->execute([$maxDailyRate]);

            return $st->fetchAll(PDO::FETCH_CLASS, "Vehicle");
        }

        function getVehiclesByModelName($modelName) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Vehicle 
                                 INNER JOIN Model ON Vehicle.modelId = Model.modelId 
                                 WHERE Model.modelName = ?");
            $st->execute([$modelName]);

            return $st->fetchAll(PDO::FETCH_CLASS, "Vehicle");
        }

        function getVehiclesByBrandName($brandName) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Vehicle 
                                 INNER JOIN Model ON Vehicle.modelId = Model.modelId 
                                 INNER JOIN Brand ON Model.brandId = Brand.brandId 
                                 WHERE Brand.brandName = ?");
            $st->execute([$brandName]);

            return $st->fetchAll(PDO::FETCH_CLASS, "Vehicle");
        }

        function getVehiclesByVehicleTypeName($vehicleType) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Vehicle 
                                 INNER JOIN Model ON Vehicle.modelId = Model.modelId 
                                 INNER JOIN VehicleType ON Model.vehicleTypeId = VehicleType.vehicleTypeId 
                                 WHERE VehicleType.vehicleType = ?");
            $st->execute([$vehicleType]);

            return $st->fetchAll(PDO::FETCH_CLASS, "Vehicle");
        }

        function getVehiclesByLicenseTypeName($licenseTypeName) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Vehicle 
                                 INNER JOIN Model ON Vehicle.modelId = Model.modelId 
                                 INNER JOIN VehicleType ON Model.vehicleTypeId = VehicleType.vehicleTypeId 
                                 INNER JOIN DriverLicenseType as dlt ON VehicleType.licenseTypeId = dlt.licenseTypeId 
                                 WHERE dlt.licenseTypeName = ?");
            $st->execute([$licenseTypeName]);

            return $st->fetchAll(PDO::FETCH_CLASS, "Vehicle");
        }

        function addNewVehicle($vehicle) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("INSERT INTO Vehicle (regNum, modelId, dailyRate, imageUrl, maxPassengerNumber, postDate) VALUES (?, ?, ?, ?, ?, ?)");
            $st->execute([$vehicle->regNum, $vehicle->model, $vehicle->dailyRate, $vehicle->imageUrl, $vehicle->maxPassengerNumber, date('Y-m-d')]);
        }

        function updateVehicle($oldRegNum, $vehicle) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("UPDATE Vehicle
                                 SET regNum = (?), dailyRate = (?), imageUrl = (?), maxPassengerNumber = (?), postDate = (?)
                                 WHERE regNum = (?);");
            $st->execute([$vehicle->regNum, $vehicle->dailyRate, $vehicle->imageUrl, $vehicle->maxPassengerNumber, date('Y-m-d'), $oldRegNum]);
        }
    }
?>