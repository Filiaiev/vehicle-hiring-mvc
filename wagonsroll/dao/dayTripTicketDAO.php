<?php
    require_once "../model/database.php";
    require_once "../model/dayTripTicket.php";

    class DayTripTicketDAO {
        private static $instance = null;
        
        private function __construct() {
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new DayTripTicketDAO();
            }               
            return self::$instance;         
        } 

        function getDayTripTicketById($id) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM DayTripTicket WHERE ticketId = ?");
            $st->execute([$id]);

            return $st->fetchObject("DayTripTicket");
        }

        function getDayTripTicketsByUserEmail($email) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT dtt.* FROM DayTripTicket as dtt
                                 INNER JOIN ContactDetails as cd ON dtt.contactDetailsId = cd.contactDetailsId 
                                 WHERE cd.email = ?");
            $st->execute([$email]);

            return $st->fetchAll(PDO::FETCH_CLASS, "DayTripTicket");
        }

        function getDayTripTicketByPurchaseDate($purchaseDate) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM DayTripTicket WHERE purchaseDate = ?");
            $st->execute([$purchaseDate]);

            return $st->fetchObject("DayTripTicket");
        }

        function getDayTripTicketsByUserMobile($mobile) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT dtt.* FROM DayTripTicket as dtt
                                 INNER JOIN ContactDetails as cd ON dtt.contactDetailsId = cd.contactDetailsId 
                                 WHERE cd.mobile = ?");
            $st->execute([$mobile]);

            return $st->fetchAll(PDO::FETCH_CLASS, "DayTripTicket");
        }

        function getDayTripTicketsByTripDate($date) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT dtt.* FROM DayTripTicket as dtt
                                 INNER JOIN DayTrip as dt ON dtt.dayTripId = dt.dayTripId
                                 WHERE dt.date = ?");
            $st->execute([$date]);

            return $st->fetchAll(PDO::FETCH_CLASS, "DayTripTicket");
        }

        function createTicket($tripTicket){
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("INSERT INTO DayTripTicket(purchaseDate, contactDetailsId, dayTripId) VALUES (?,?,?)");
            $st->execute([
                        $tripTicket->purchaseDate,
                        $tripTicket->contactDetails,
                        $tripTicket->dayTrip
                    ]);
        }
    }

?>