<?php
    require_once "../dao/vehicleDAO.php";

    $allVehicles = VehicleDAO::getInstance()->getAllVehicles();
    $allVehicleTypes = VehicleTypeDAO::getInstance()->getAllVehicleTypes();

    require_once "../view/homeManager_view.php";
?>