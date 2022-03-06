<?php
    require_once "../model/database.php";
    require_once "../model/address.php";

    class AddressDAO {
        private static $instance = null;
        
        private function __construct() {
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new AddressDAO();
            }               
            return self::$instance;         
        }

        function getAddressById($id) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM Address WHERE addressId = ?");
            $st->execute([$id]);

            return $st->fetchObject("Address");
        }
        
    }
?>