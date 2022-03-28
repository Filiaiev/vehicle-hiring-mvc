<?php
    require_once "../dao/dayTripDAO.php";
    require_once "../dao/addressDAO.php";
    require_once "../model/dayTrip.php";
    require_once "../model/role.php";
    require_once "../model/user.php";

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION["user"]) || $_SESSION["user"]->roleId != Role::EVENT_COORDINATOR) {
        echo "Action is not allowed";
        exit();
    }

    $addressLine1 = $_REQUEST["addressLine1"];
    $addressLine2 = $_REQUEST["addressLine2"];
    $city = $_REQUEST["city"];
    $county = $_REQUEST["county"];
    $postcode = $_REQUEST["postcode"];

    $venue = $_REQUEST["venue"];
    $price = $_REQUEST["price"];
    $maxPassengersNum = $_REQUEST["maxPassengersNum"];
    $date = $_REQUEST["date"];
    $pickupTime = $_REQUEST["pickupTime"];
    $returnTime = $_REQUEST["returnTime"];

    $status = false;
    $statusText = "Please fill in all fields correctly and try again";

    if($addressLine1!="" && isset($addressLine1) && $addressLine2!="" && isset($addressLine2) && $city!="" && isset($city) && $county!="" && isset($county)&& $postcode!="" && isset($postcode))
    {
        $address = new Address();
        $address->addressLine1 = $addressLine1;
        $address->addressLine2 = $addressLine2;
        $address->city = $city;
        $address->county = $county;
        $address->postcode = $postcode;

        AddressDAO::getInstance()->addNewAddress($address);
    }

    if($venue!="" && isset($venue) && $price!="" && isset($price) && $maxPassengersNum!="" && isset($maxPassengersNum) && $date!="" && isset($date)&& $pickupTime!="" && isset($pickupTime) && $returnTime!="" && isset($returnTime) && $date > date('Y-m-d') && $pickupTime < $returnTime)
    {
        $trip = new DayTrip();
        $trip->pickupAddress = AddressDAO::getInstance()->getIdByAddress($addressLine1, $addressLine2, $city, $county, $postcode)->addressId;
        $trip->venue = $venue;
        $trip->price = $price;
        $trip->maxPassengersNum = $maxPassengersNum;
        $trip->date = $date;
        $trip->pickupTime = $pickupTime;
        $trip->returnTime = $returnTime;

        DayTripDAO::getInstance()->addNewTrip($trip);

        $status = true;
        $statusText = "New day trip was addded";
    }

    require_once "../view/statusDayTrip_view.php";
?>