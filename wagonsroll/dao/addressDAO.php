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

        function getIdByAddress($addressLine1, $addressLine2, $city, $county, $postcode){
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT addressId FROM Address WHERE addressLine1 = ? AND addressLine2 = ? AND city = ? AND county = ? AND postcode = ?");
            $st->execute([$addressLine1, $addressLine2, $city, $county, $postcode]);

            return $st->fetchObject("Address");
        }
       
        function addNewAddress($newAdress) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("INSERT INTO Address(addressLine1, addressLine2, city, county, postcode) VALUES (?,?,?,?,?)");
            $st->execute([$newAdress->addressLine1,
                        $newAdress->addressLine2,
                        $newAdress->city,
                        $newAdress->county,
                        $newAdress->postcode
                    ]);
        }
    }
?>