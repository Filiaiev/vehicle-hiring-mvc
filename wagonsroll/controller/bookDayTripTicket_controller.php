<?php
require_once "../dao/dayTripTicketDAO.php";
require_once "../dao/contactDetailsDAO.php";
session_start();

$allDayTrips = DayTripDAO::getInstance()->getAlldayTrips();

$purchaseDate = $_REQUEST["purchaseDate"];
$dayTrip = $_REQUEST["dayTripId"];
$contactDetails = $_SESSION['contactDetails']->contactDetailsId;

$tripTicket = new DayTripTicket();
$tripTicket->purchaseDate = $purchaseDate;
$tripTicket->dayTrip = $dayTrip;
$tripTicket->contactDetails = $contactDetails;

DayTripTicketDAO::getInstance()->createTicket($tripTicket);

$updateDayTrip = DayTripDAO::getInstance()->getDayTripById($dayTrip);
DayTripDAO::getInstance()->decresePasNum($dayTrip, $updateDayTrip);

$userEmail = ContactDetailsDAO::getInstance()->getContactDetailsById($contactDetails)->email;
?>
<h2>Your ticket: </h2>
<div style="border: 2px outset black; width:fit-content; padding: 5px; margin-bottom:10px;">
  <a>User email: <?= $userEmail ?></a><br>
  <a>Pick-up address: <?= $updateDayTrip->pickupAddress->addressLine1, $updateDayTrip->pickupAddress->addressLine2 ?></a><br>
  <a>Venue: <?= $updateDayTrip->venue?></a><br>
  <a>Price: <?= $updateDayTrip->price ?></a><br>
  <a>Date: <?= $updateDayTrip->date ?></a><br>
  <a>Pick-up time: <?= $updateDayTrip->pickupTime ?></a><br>
  <a>Retur time: <?= $updateDayTrip->returnTime ?></a><br>
  <a>Ticket purchase date: <?= $tripTicket->purchaseDate ?></a><br>
</div>
<a href="userDayTrips_controller.php">Return to events</a>

