<?php
    header('Content-Type: application/json');
    require_once "../dao/vehicleDAO.php";

    if(!isset($_GET["namePattern"])) {
        echo json_encode([]);
    }else {
        $vehiclesNamesHints = VehicleDAO::getInstance()->getVehiclesHintsByFullNamePattern($_GET["namePattern"]);
        echo json_encode($vehiclesNamesHints);
    }
?>