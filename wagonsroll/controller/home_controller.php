<?php
    session_start();
    
    const AVAILABLE_FILTERS = array(
        "brandName[]",
        "typeName[]",
        "passengersNum[]",
        "dailyRate[]",
        "availableDate[]"
    );

    // if(!isset($_SESSION["user"])) {
        // require_once "../view/home1_view.php";
    // }
    require_once "../view/home1_view.php";
?>