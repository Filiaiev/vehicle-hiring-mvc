<!DOCTYPE html>
<html>
    <head>
        <title>Day tripper page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script type="text/javascript" src="../client/js/home/ticketBooking.js"></script>
        <script src="https://use.fontawesome.com/47474f8808.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../client/style/header.css"/>
        <link rel="stylesheet" href="../client/style/dayTrip.css"/>
        <link rel="stylesheet" href="../client/style/general.css">
    </head>
    <body>
        <?php require_once "block/header.php" ?>
        <ul class="nav nav-tabs nav-fill">
            <li class="nav-item">
                <a class="nav-link" href="home_controller.php">Homepage</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="userDayTrips_controller.php">Daytrips</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cart_controller.php">Basket</a>
            </li>
        </ul>

        <div class="container-fluid">
            <div class="title-block">
                <h3 class="event-title">Choose event</h3>
            </div>
            <?php if($allDayTrips){ ?>
                <div class="dayTripBlock">
                    <?php foreach ($allDayTrips as $dayTrip): ?>
                        <div class="dayTripItem">
                            <div class="inner-dayTripItem">
                                <h6 class="trip-venue"><?= $dayTrip->venue?></h6><br>
                                <div class="trip-information"> 
                                    <a><span>Pick-up street: </span>
                                        <?= $dayTrip->pickupAddress->addressLine1 ?>
                                        <?= $dayTrip->pickupAddress->addressLine2 ?> 
                                    </a><br>
                                    <a><span>Pick-up city: </span><?= $dayTrip->pickupAddress->city ?></a><br>
                                    <a><span>Price: </span><?= $dayTrip->price ?></a><br>
                                    <a><span>Number of available tickets: </span><?= $dayTrip->maxPassengersNum ?></a><br>
                                    <a><span>Date: </span><?= $dayTrip->date ?></a><br>
                                    <a><span>Pick-up time: </span><?= $dayTrip->pickupTime ?></a><br>
                                    <a><span>Return time: </span><?= $dayTrip->returnTime ?></a><br> 
                                </div>
                                <?php
                                if($user) :?>
                                    <button class="btn btn-secondary ticketbooking" id="<?=$dayTrip->dayTripId?>">Book ticket</button>
                                <?php endif ?>
                                <?php
                                if(!$user) :?>
                                    <p class="red-text">If you want to book ticket then go to the <a href="register_controller.php" class="registration-link">REGISTRATION</a></p>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php } else {?>
                <h3 class="noTrip-text">There are no day-trips yet</h3>
            <?php } ?>
        </div>
    </body>
</html>
