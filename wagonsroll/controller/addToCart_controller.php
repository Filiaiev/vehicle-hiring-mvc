<?php 
require_once "countHirePrice_controller.php";

if(!isset($_SESSION)) {
       session_start();
   }

  if (isset($_SESSION['cart'])) {

  	$cart_id = array_column($_SESSION['cart'], "regNum");
  	if (!in_array($_POST['regNum'], $_SESSION['cart'])) {
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
  	}
  	
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
  }
