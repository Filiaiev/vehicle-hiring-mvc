<?php
    require_once "../dao/dayTripDAO.php";
    require_once "../model/role.php";
    require_once "../model/user.php";
    
    $user = null;
    session_start();
    if(isset($_SESSION["user"]) && $_SESSION["user"]->roleId == Role::CUSTOMER) {
      $user = $_SESSION["user"];
    }
    $allDayTrips = DayTripDAO::getInstance()->getAlldayTrips();
  
    require_once "../view/userDayTrips_view.php";
?> 