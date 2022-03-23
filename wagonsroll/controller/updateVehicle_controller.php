<?php
    require_once "../model/role.php";
    require_once "../model/user.php";
    
    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION) || $_SESSION["user"]->roleId != Role::SHOP_MANAGER) {
        echo "Action is not allowed";
        exit();
    }

    require_once "../dao/vehicleDAO.php";

    if(!empty($_POST["save"])) {
        $oldRegNum = $_REQUEST["oldRegNum"];
        $regNum = $_REQUEST["regNum"];
        $dailyRate = $_REQUEST["dailyRate"];
        $maxPassengerNumber = $_REQUEST["maxPassengerNumber"]; 
        $imageUrl = $_REQUEST["imageUrl"]; 

        $vehicle = new Vehicle();
        $vehicle->regNum = $regNum;
        $vehicle->dailyRate = $dailyRate;
        $vehicle->imageUrl = $imageUrl;
        $vehicle->maxPassengerNumber = $maxPassengerNumber;
        VehicleDAO::getInstance()->updateVehicle($oldRegNum, $vehicle);
    
        $status = true;
        $statusText = "Information about vehicle \"$oldRegNum\" was updated";

        require_once "../view/statusHandler_view.php";
    } else {
        $vehicle = VehicleDAO::getInstance()->getVehicleByRegNum($_REQUEST['regNum']);

        require_once "../view/updateVehicle_view.php";
    }
?>