<?php
    require_once "../model/database.php";
    require_once "../model/address.php";
    require_once "../dao/util/queryBuilder.php";

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

        function getAddressByDetails($addressDetails) {
            $pdo = Database::getInstance()->getPDO();
            
            $i = count($addressDetails);
            $selectQuery = "SELECT * FROM `Address` WHERE ";
            foreach($addressDetails as $field => $value) {
                $selectQuery .= !empty($value) ? "$field = ?" : "$field IS NULL"; 
                if(--$i) {
                    $selectQuery .= " AND ";
                }
            }

            $stParams = array_filter($addressDetails, function($value) {return !empty($value);});
            $st = $pdo->prepare($selectQuery);
            $st->execute(array_values($stParams));

            return $st->fetchObject("Address");
        }
       
        function save(array $addressDetails) {
            $address = $this->getAddressByDetails($addressDetails);
            if($address != null) {
                return $address;
            }

            $pdo = Database::getInstance()->getPDO();
            
            $stParams = array_filter($addressDetails, function($value) {return !empty($value);});
            $insertQuery = "INSERT INTO `Address`(";
            
            // Question marks query part ... VALUES(?, ...)
            $qmarks = QueryBuilder::buildPreparedQuestionMarks($stParams);
            
            // Field names query part INSERT INTO(...)
            $insertQuery .= QueryBuilder::buildValuesToInsert($stParams).") VALUES (".$qmarks.")";

            $st = $pdo->prepare($insertQuery);
            $st->execute(array_values($stParams));

            $insertedAddressId = $pdo->lastInsertId();
            $addressDetails["addressId"] = $insertedAddressId;

            return new Address($addressDetails);
        }
    }
?>