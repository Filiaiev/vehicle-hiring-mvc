<?php
    require_once "../dao/dayTripDAO.php";

    $allDayTrips = DayTripDAO::getInstance()->getAlldayTrips();
        
    require_once "../view/eventCoordinator_view.php";
?> 