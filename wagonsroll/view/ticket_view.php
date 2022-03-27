<link rel="stylesheet" href="../client/style/dayTrip.css"/>
<link rel="stylesheet" href="../client/style/general.css">

<div class="addTriptitle-block">
                <h3 class="event-title">Your ticket: </h3>
</div>
<div class="ticket-block">
  <div class="ticket">
    <p><span>User email: </span><?= $userEmail ?></p><br>
    <p><span>Pick-up address: </span><?= $updateDayTrip->pickupAddress->addressLine1, $updateDayTrip->pickupAddress->addressLine2 ?></p><br>
    <p><span>Venue: </span><?= $updateDayTrip->venue?></p><br>
    <p><span>Price: </span><?= $updateDayTrip->price ?></p><br>
    <p><span>Date: </span><?= $updateDayTrip->date ?></p><br>
    <p><span>Pick-up time: </span><?= $updateDayTrip->pickupTime ?></p><br>
    <p><span>Retur time: </span><?= $updateDayTrip->returnTime ?></p><br>
    <p><span>Ticket purchase date: </span><?= $tripTicket->purchaseDate ?></p><br>
  </div>
  <div class="returnToEvents-block"><a href="userDayTrips_controller.php"  class="returnToEvents-link">Return to events</a></div>
</div>
