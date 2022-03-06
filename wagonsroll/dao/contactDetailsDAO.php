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
    }
?>