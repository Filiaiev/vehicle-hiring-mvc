<?php
    require_once "../dao/vehicleDAO.php";
    require_once "../config/filterConfig.php";

    // if(!isset($_SESSION)) {
        // session_start();
    // }
    
    require_once "../service/auth_service.php";

    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"]) && trim($_GET["search"] != "")) {
        $vehicles = VehicleDAO::getInstance()->getVehiclesByFullNamePattern($_GET["search"]);
    }else if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)) {
        $filterParams = array(
            "in" => $inFilters = array_filter(IN_FILTERS, function($key) {return isset($_GET[$key]);}, ARRAY_FILTER_USE_KEY),
            "between" => $betweenFilters = array_filter(BETWEEN_FILTERS, function($key) {return isset($_GET[$key]);}, ARRAY_FILTER_USE_KEY)
        );

        $filteringFieldsCount = 0;
        foreach($filterParams as $filteringMethod => $filteringFields) {
            $filteringFieldsCount += count($filteringFields);
        }

        if($filteringFieldsCount > 0) {
            foreach($filterParams as $key => $array) {
                $params = array();
                foreach($array as $v => $t) {
                    $params[$v] = $_GET[$v];
                }
                $filterParams[$key] = $params;
            }
    
            $vehicles = VehicleDAO::getInstance()->getVehiclesByFilter($filterParams);
        }else {
            $vehicles = VehicleDAO::getInstance()->getAllVehicles();
        }

    }else {
        $vehicles = VehicleDAO::getInstance()->getAllVehicles();
    }

    if($_SESSION["user"]->roleId == Role::CUSTOMER) {
        require_once "../view/home_view.php";
    }else if($_SESSION["user"]->roleId == Role::SHOP_MANAGER) {
        $vehiclesTypes = VehicleTypeDAO::getInstance()->getAllVehicleTypes();
        require_once "../view/homeManager_view.php";
    }
?>