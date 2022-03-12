<?php
    require_once "../dao/vehicleDAO.php";

    $allVehicles = VehicleDAO::getInstance()->getAllVehicles();
    $allVehicleTypes = VehicleTypeDAO::getInstance()->getAllVehicleTypes();

    require_once "../view/managerHomepage_view.php";
?>