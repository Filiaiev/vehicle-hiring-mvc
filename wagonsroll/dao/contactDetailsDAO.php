<?php
    require_once "../model/database.php";
    require_once "../model/contactDetails.php";

    class ContactDetailsDAO {
        private static $instance = null;
        
        private function __construct() {
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new ContactDetailsDAO();
            }               
            return self::$instance;         
        }

        function getContactDetailsById($id) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM ContactDetails WHERE contactDetailsId = ?");
            $st->execute([$id]);

            return $st->fetchObject("ContactDetails");
        }

        function getContactDetailsByEmail($email) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM ContactDetails WHERE email = ?");
            $st->execute([$email]);

            return $st->fetchObject("ContactDetails");
        }

        function save(array $contactDetails) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("INSERT INTO ContactDetails(firstName, familyName, mobile, email, addressId)
                                 VALUES(?, ?, ?, ?, ?)");
            $st->execute([
                $contactDetails["firstName"],
                $contactDetails["familyName"],
                $contactDetails["mobile"],
                $contactDetails["email"],
                $contactDetails["addressId"]
            ]);

            $insertedContactDetailsId = $pdo->lastInsertId();
            $contactDetails["contactDetailsId"] = $insertedContactDetailsId;

            return new ContactDetails($contactDetails);
        }

        function getContactDetailsByDetails(array $contactDetails) {
            $pdo = Database::getInstance()->getPDO();
            $query = "SELECT * FROM ContactDetails as cd
                      INNER JOIN `Address` as a ON cd.addressId = a.addressId
                      WHERE cd.firstName = ? AND cd.familyName = ? AND cd.mobile = ? AND cd.email = ?";

            $executionParams = [
                $contactDetails["firstName"],
                $contactDetails["familyName"],
                $contactDetails["mobile"],
                $contactDetails["email"],
            ];

            foreach($contactDetails["address"] as $field => $value) {
                if($value != null) {
                    $query .= " AND a.$field = ?";
                    $executionParams[] = $value;
                }
            }

            $st = $pdo->prepare($query);
            $st->execute($executionParams);

            $cd = $st->fetchObject("ContactDetails");
            return $cd;
        }
    }

?>