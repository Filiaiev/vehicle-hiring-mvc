<?php
    require_once "../service/auth_service.php";

    if($_SESSION["user"]->roleId != Role::SHOP_MANAGER) {
        echo "Action is not allowed";
        exit();
    }

    require_once "../model/vehicle.php";
    require_once "../model/model.php";
    require_once "../dao/vehicleDAO.php";
    require_once "../dao/modelDAO.php";
    require_once "../dao/brandDAO.php";

    $regNum = $_REQUEST["regNum"];
    $brand = $_REQUEST["brand"]; 
    $model = $_REQUEST["model"];
    $type = $_REQUEST["type"]; 
    $dailyRate = $_REQUEST["dailyRate"];
    $maxPassengerNumber = $_REQUEST["maxPassengerNumber"]; 
    $imageUrl = $_REQUEST["imageUrl"]; 

    $status = false;
    $statusText = "Please fill in all fields and try again";

    if($regNum!="" && $brand!="" && $model!="" && $type!="" && $dailyRate!="" && $maxPassengerNumber!="" && $imageUrl!="" &&
        isset($regNum) && isset($brand) && isset($model) && isset($type) && isset($dailyRate) && isset($maxPassengerNumber) && isset($imageUrl)) {
            
        if(VehicleDAO::getInstance()->getVehicleByRegNum($regNum)) {
            $statusText = "Vehicle with registration number \"$regNum\" already exist";
        } else {

            if(!BrandDAO::getInstance()->getBrandByName($brand))
                BrandDAO::getInstance()->addNewBrand($brand);

            if(!ModelDAO::getInstance()->getModelByName($model)) {
                $modelObj = new Model();
                $modelObj->modelName = $model;
                $modelObj->brand = BrandDAO::getInstance()->getBrandByName($brand)->brandId;
                $modelObj->vehicleType = VehicleTypeDAO::getInstance()->getVehicleTypeByName($type)->vehicleTypeId;
                ModelDAO::getInstance()->addNewModel($modelObj);
            }

            $vehicle = new Vehicle();
            $vehicle->regNum = $regNum;
            $vehicle->model = ModelDAO::getInstance()->getModelByName($model)->modelId;
            $vehicle->dailyRate = $dailyRate;
            $vehicle->imageUrl = $imageUrl;
            $vehicle->maxPassengerNumber = $maxPassengerNumber;
            VehicleDAO::getInstance()->save($vehicle);

            $status = true;
            $statusText = "New vehicle \"$regNum\" was addded";
        }
    }

    require_once "../view/statusHandler_view.php";
?>
