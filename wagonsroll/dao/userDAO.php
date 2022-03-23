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
        
        function getUserByEmail($email) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM User WHERE email = ?");
            $st->execute([$email]);

            return $st->fetchObject("User");
        }

        function save(User $user) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("INSERT INTO `User`(roleId, email, pass) VALUES (?, ?, ?)");
            $st->execute([
                Role::CUSTOMER,
                $user->email,
                password_hash($user->pass, PASSWORD_BCRYPT)
            ]);
        }
    }
?>