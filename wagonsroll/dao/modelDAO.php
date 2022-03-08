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
    }
?>