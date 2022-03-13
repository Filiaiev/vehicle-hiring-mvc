<?php
    require_once "../dao/vehicleDAO.php";
    require_once "../config/filterConfig.php";
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)) {
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
    
            $allVehicles = VehicleDAO::getInstance()->getAllVehiclesByFilter($filterParams);
        }else {
            $allVehicles = VehicleDAO::getInstance()->getAllVehicles();
        }

        require_once "../view/home_view.php";
    }else {
        $allVehicles = VehicleDAO::getInstance()->getAllVehicles();
        require_once "../view/home_view.php";
    }

?>