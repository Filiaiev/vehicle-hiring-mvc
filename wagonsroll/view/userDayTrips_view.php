<!DOCTYPE html>
<html>
    <head>
        <title>Day tripper page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script type="text/javascript" src="../client/js/home/ticketBooking.js"></script>
    </head>
    <body>
        <h3>Choose event</h3>
        <?php if($allDayTrips){ ?>
            <div style="display: flex; flex-wrap:wrap; justify-content:center">
                <?php foreach ($allDayTrips as $dayTrip): ?>
                    <div class="dayTripBlock" style="border: 2px outset black; width:300px; margin: 5px 15px">
                        <div style="padding: 5px">
                            <a><?= $dayTrip->pickupAddress ?></a><br>
                            <a><?= $dayTrip->venue?></a><br>
                            <a><?= $dayTrip->price ?></a><br>
                            <a><?= $dayTrip->maxPassengersNum ?> seats</a><br>
                            <a><?= $dayTrip->date ?></a><br>
                            <a><?= $dayTrip->pickupTime ?></a><br>
                            <a><?= $dayTrip->returnTime ?></a><br>
                            <?php
                            if($user) :?>
                                <button class="btn btn-secondary ticketbooking" style="margin-top:2px" id="<?=$dayTrip->dayTripId?>">Book ticket</button>
                            <?php endif ?>
                            <?php
                            if(!$user) :?>
                                <p style="color: red">If you want to book ticket then go to the <a href="register_controller.php">registration</a></p>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php } else {?>
            <h3 style="color: red">There are no day-trips yet</h3>
        <?php } ?>
   

     
    </body>
</html>
