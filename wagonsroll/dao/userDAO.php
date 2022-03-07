<?php
    require_once "../model/database.php";
    require_once "../model/user.php";
    require_once "../model/role.php";

    class UserDAO {
        private static $instance = null;
        
        private function __construct() {
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new UserDAO();
            }               
            return self::$instance;         
        } 

        // Only for the TESTING purposes !!!
        // TODO: Delete at the end
        function getAllUsers() {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT u.email, u.pass, r.roleName FROM User as u INNER JOIN `Role` as r ON u.roleId = r.roleId");
            $st->execute();

            return $st->fetchAll(PDO::FETCH_CLASS, "User");
        }
        
        function getUserByEmail($email) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT u.email, u.pass, r.roleName FROM User as u 
                                 INNER JOIN `Role` as r ON u.roleId = r.roleId
                                 WHERE u.email = ?");
            $st->execute([$email]);

            return $st->fetchObject("User");
        }
    }
?>