<?php
    require_once "../model/database.php";
    require_once "../model/model.php";

    class ModelDAO {
        private static $instance = null;
        
        private function __construct() {
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new ModelDAO();
            }               
            return self::$instance;         
        } 

        function getModelById($id) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Model WHERE modelId = ?");
            $st->execute([$id]);

            return $st->fetchObject("Model");
        }

        function getModelByName($name) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Model WHERE modelName = ?");
            $st->execute([$name]);

            return $st->fetchObject("Model");
        }

        function getAllModels() {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Model");
            $st->execute();

            return $st->fetchAll(PDO::FETCH_CLASS, "Model");
        }

        function addNewModel($model) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("INSERT INTO Model (modelName, brandId, vehicleTypeId) VALUES (?, ?, ?)");
            $st->execute([$model->modelName, $model->brand, $model->vehicleType]);
        }
    }
?>