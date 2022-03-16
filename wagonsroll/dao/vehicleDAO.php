<?php
    require_once "../model/database.php";
    require_once "../model/vehicle.php";
    require_once "../dao/util/queryBuilder.php";
    require_once "../config/filterConfig.php";

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

        function getVehiclesByFilter($filterParams) {
            $pdo = Database::getInstance()->getPDO();
            $selectQuery = "SELECT DISTINCT Vehicle.* FROM Vehicle".
                            " INNER JOIN Model ON Vehicle.modelId = Model.modelId".
                            " INNER JOIN Brand ON Model.brandId = Brand.brandId".
                            " INNER JOIN VehicleType ON Model.vehicleTypeId = VehicleType.vehicleTypeId".
                            " INNER JOIN DriverLicenseType ON VehicleType.licenseTypeId = DriverLicenseType.licenseTypeId".
                            " WHERE ";

            $executionParams = array();
            $i = count($filterParams["in"]) + count($filterParams["between"]);

            foreach($filterParams as $key => $arr) {
                foreach($arr as $field => $values) {
                    if($key == "in") {
                        $selectQuery .= AVAILABLE_FILTERS[$key][$field].".$field IN ("
                        .QueryBuilder::buildPreparedQuestionMarks($values)
                        .")";
                    }else if($key == "between") {
                        $selectQuery .= AVAILABLE_FILTERS[$key][$field].".$field BETWEEN ? AND ?";
                    }

                    if(--$i) {
                        $selectQuery .= " AND ";
                    }

                    $executionParams = array_merge($executionParams, $values);
                }
            }

            $st = $pdo->prepare($selectQuery);
            $st->execute($executionParams);
            
            return $st->fetchAll(PDO::FETCH_CLASS, "Vehicle");
        }

        function getVehiclesByFullNamePattern($fullName) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT v.* FROM Vehicle as v".
                         " JOIN Model as m ON m.modelId = v.modelId".
                         " JOIN Brand as b ON b.brandId = m.brandId".
                         " WHERE CONCAT(b.brandName, ' ', m.modelName) LIKE ?");
            $st->execute(["%$fullName%"]);
            
            return $st->fetchAll(PDO::FETCH_CLASS, "Vehicle");
        }

        function getVehiclesHintsByFullNamePattern($fullNamePattern) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT DISTINCT CONCAT(b.brandName, ' ', m.modelName) AS fullName FROM".
                                " Vehicle AS v JOIN Model as m ON m.modelId = v.modelId".
                                " JOIN Brand AS b ON b.brandId = m.brandId".
                                " WHERE CONCAT(b.brandName, ' ', m.modelName) LIKE ? LIMIT 5");
            $st->execute(["%$fullNamePattern%"]);

            return $st->fetchAll(PDO::FETCH_COLUMN, 0);
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

        function save($vehicle) {
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