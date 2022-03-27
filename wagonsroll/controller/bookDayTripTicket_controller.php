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

require_once "../view/ticket_view.php";
?>


