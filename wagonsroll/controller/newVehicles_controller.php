<?php
    require_once "../dao/vehicleDAO.php";

    $newVehicles = VehicleDAO::getInstance()->getNewVehicles();

    $index = 0;
    
    require_once "../view/block/newVehicles.php";
?>
