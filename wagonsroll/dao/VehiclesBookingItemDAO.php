<?php
    require_once "../model/database.php";

    class VehiclesBookingItemDAO {
        private static $instance = null;
        
        private function __construct() {
        }

        static function getInstance() {
            if(self::$instance == null) {
                self::$instance = new VehiclesBookingItemDAO();
            }               
            return self::$instance;         
        }
    
        function save(array $itemBookingDetails) {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("INSERT INTO 
                                 VehiclesBookingItem(startDate, endDate, bookingId, regNum)
                                 VALUES(?, ?, ?, ?)");
            $st->execute($itemBookingDetails);
            return $pdo->lastInsertId();
        }

        function getVehiclesBookingItemById($id) {
            $dbInstance = Database::getInstance();
            $pdo = $dbInstance->getPDO();
            $st = $pdo->prepare("SELECT * FROM VehiclesBookingItem WHERE bookingDetailId = ?");
            $st->execute([$id]);

            return $st->fetchObject("VehiclesBookingItem");
        }

        function getVehiclesBookingItemsByBooking($vehiclesBookingId){
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare("SELECT * FROM VehiclesBookingItem 
                                WHERE bookingId = ?");
            $st->execute([$vehiclesBookingId]);

            return $st->fetchAll(PDO::FETCH_CLASS, "VehiclesBookingItem");
        }

        function isVehicleAvailableByDates($regNum, $newStartDate,$newEndDate)
        {
            $pdo = Database::getInstance()->getPDO();
            $st = $pdo->prepare('SELECT COUNT(*) From VehiclesBookingItem as vbi
            WHERE vbi.regNum = :regNum AND
            (
                (vbi.startDate BETWEEN :newStartDate AND :newEndDate) 
                OR
                (vbi.endDate BETWEEN  :newStartDate AND :newEndDate)
                OR
                (:newStartDate BETWEEN vbi.startDate AND vbi.endDate )
                OR      
                (:newEndDate BETWEEN vbi.startDate AND vbi.endDate )      
            )
            ');
            $trueRegNum = str_replace('_', ' ', $regNum);
            $st->bindParam(':regNum', $trueRegNum, PDO::PARAM_STR);
            $st->bindParam(':newStartDate', $newStartDate, PDO::PARAM_STR);
            $st->bindParam(':newEndDate', $newEndDate, PDO::PARAM_STR);
            $st->execute();
            $var = $st->fetchColumn(0);
            if ( $var  > 0){
                return false;
            }else{
                return  true;
            };
        }
    }
?>