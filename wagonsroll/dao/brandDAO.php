<?php
    require_once "../model/database.php";
    require_once "../model/brand.php";

    class BrandDAO {
        private static $instance = null;
        
        private function __construct() {
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new BrandDAO();
            }               
            return self::$instance;         
        } 

        function getAllBrands() {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->query("SELECT * FROM Brand");
            $st->execute();

            return $st->fetchAll(PDO::FETCH_CLASS, "Brand");
        }

        function getBrandById($id) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Brand WHERE brandId = ?");
            $st->execute([$id]);

            return $st->fetchObject("Brand");
        }

        function getBrandByName($name) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Brand WHERE brandName = ?");
            $st->execute([$name]);

            return $st->fetchObject("Brand");
        }

        function getAllBrands() {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Brand");
            $st->execute();

            return $st->fetchAll(PDO::FETCH_CLASS, "Brand");
        }

        function addNewBrand($brand) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("INSERT INTO Brand (brandName) VALUES (?)");
            $st->execute([$brand]);
        }
    }
?>