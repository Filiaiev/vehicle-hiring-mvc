<?php
  require_once "../dao/dayTripDAO.php";
  require_once "../dao/addressDAO.php";
  require_once "../model/dayTrip.php";
  require_once "../controller/eventCoordinator_controller.php";

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

  if($venue!="" && isset($venue) && $price!="" && isset($price) && $maxPassengersNum!="" && isset($maxPassengersNum) && $date!="" && isset($date)&& $pickupTime!="" && isset($pickupTime) && $returnTime!="" && isset($returnTime))
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
  }
  
  require_once "../view/eventCoordinator_view.php";
?>