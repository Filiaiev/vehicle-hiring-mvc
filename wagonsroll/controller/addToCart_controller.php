<?php 
require_once "functions/countHirePrice.php";
require_once "../dao/vehiclesBookingItemDAO.php";

if(!isset($_SESSION)) {
       session_start();
   }

   $isTheVehicleAvailable = VehiclesBookingItemDAO::getInstance()->isVehicleAvailableByDates($_POST['regNum'],$_POST['startDate'],$_POST['endDate']);

  if ($isTheVehicleAvailable){
       if (isset($_SESSION['cart'])) {

              $cart_id = array_column($_SESSION['cart'], "regNum");
              if (!in_array($_POST['regNum'], array_column($_SESSION['cart'], 'regNum'))) {
                     $item_array = array(
                 "regNum" => $_POST['regNum'],
                 "brandName" => $_POST['brandName'],
                 "modelName" => $_POST['modelName'],
                 "typeName" => $_POST['typeName'],
                 "maxPassengerNumber" => $_POST['maxPassengerNumber'],
                 "dailyRate" => $_POST['dailyRate'],
                 "startDate" => $_POST['startDate'],
                 "endDate" => $_POST['endDate'],
                 "imageUrl" => $_POST['imageUrl'],
                 "price" => countHirePrice($_POST['startDate'],$_POST['endDate'],$_POST['dailyRate'])
             );

              $_SESSION['cart'][] = $item_array;
              echo 'You have successfully added '.$_POST['brandName'].' '.$_POST['modelName'].' to your basket.';
              }else{echo "Sorry, the vehicle you have just chosen is already present in the basket.\n You can't add the same item twice. Please try adding another vehicle.";}
              
       }else{
              $item_array = array(
              "regNum" => $_POST['regNum'],
              "brandName" => $_POST['brandName'],
              "modelName" => $_POST['modelName'],
              "typeName" => $_POST['typeName'],
              "maxPassengerNumber" => $_POST['maxPassengerNumber'],
              "dailyRate" => $_POST['dailyRate'],
              "startDate" => $_POST['startDate'],
              "endDate" => $_POST['endDate'],
              "imageUrl" => $_POST['imageUrl'],
              "price" => countHirePrice($_POST['startDate'],$_POST['endDate'],$_POST['dailyRate'])
              );
     
              $_SESSION['cart'][] = $item_array;
              echo 'You have successfully added '.$_POST['brandName'].' '.$_POST['modelName'].' to your basket.';
       }
       
  }else {echo "Unfortunately you can't book ".$_POST['brandName']." ".$_POST['modelName']." for the selected dates as the vehicle is booked within the period.\nPlease try again using other dates."; }
