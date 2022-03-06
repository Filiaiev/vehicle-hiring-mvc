<?php
    require_once "../config/dbConfig.php";

    class Database {
        private static $instance = null;
        private $pdo;
        
        private function __construct() {
            $this->pdo = new PDO(DSN, USERNAME, PASSWORD, OPTIONS);
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new Database();
            }               
            return self::$instance;         
        } 

        public function getPDO() {
            return $this->pdo;
        }
    }
?>