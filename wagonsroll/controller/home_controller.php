<?php
    require_once "../dao/vehicleDAO.php";
    require_once "../config/filterConfig.php";
    session_start();
    
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

    require_once "../view/home_view.php";
?>