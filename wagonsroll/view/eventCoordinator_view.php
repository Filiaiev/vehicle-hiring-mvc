<!DOCTYPE html>
<html>
    <head>
        <title>Event Coordinator Homepage</title>
        <script src="https://use.fontawesome.com/47474f8808.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../client/style/dayTrip.css"/>
        <link rel="stylesheet" href="../client/style/general.css">
    </head>
    <body>
        <?php require_once "block/header.php" ?>
        <div class="container-fluid">
            <div class="addTriptitle-block">
                <h3 class="event-title">Add new day-trip:</h3>
            </div>
            <form method="post" action="addDayTrip_controller.php">
                <div class="add-trip-form"> 
                    <div class="dayTrip-address"> 
                        <label>Enter pick-up address line 1: <br><input type="text" name="addressLine1" placeholder="Pick-up address Line1"/></label><br>
                        <label>Enter pick-up address line 2: <br><input type="text" name="addressLine2" placeholder="Pick-up address Line2"/></label><br>
                        <label>Enter pick-up city: <br><input type="text" name="city" placeholder="Pick-up city"/></label><br>
                        <label>Enter pick-up county: <br><input type="text" name="county" placeholder="Pick-up county"/></label><br>
                        <label>Enter pick-up postcode: <br><input type="text" name="postcode" placeholder="Pick-up postcode"/></label><br>
                    </div>
                    <div > 
                        <label>Enter venue of trip: <br><input type="text" name="venue" placeholder="Venue"/></label><br>
                        <label>Enter price: <br><input type="text" name="price" placeholder="Price"/></label><br>
                        <label>Enter number of tickets: <br><input type="text" name="maxPassengersNum" placeholder="Max passenger number"/></label><br>
                        <label>Enter date of trip: <br><input type="date" name="date" placeholder="Date"/></label><br>
                        <label>Enter pick-up time: <br><input type="time" name="pickupTime" placeholder="pickup Time"/></label><br>
                        <label>Enter return time: <br><input type="time" name="returnTime" placeholder="return Time"/></label><br>
                    </div>
                </div>
                <div class="block-add-trip-btn"><input class="add-trip-btn" type="submit" value="Add a new trip"></div>
            </form>
            
            <div class="title-block">
                <h3 class="event-title">List of day-trips:</h3>
            </div>
            <?php if($allDayTrips){ ?>
                <div class="dayTripBlock">
                    <?php foreach ($allDayTrips as $dayTrip): ?>
                        <div class="dayTripItem">
                            <div class="inner-dayTripItem">
                                <h6 class="trip-venue"><?= $dayTrip->venue?></h6><br>
                                <div class="tripInfo-for-coordinator"> 
                                    <a><span>Pick-up street: </span>
                                        <?= $dayTrip->pickupAddress->addressLine1 ?>
                                        <?= $dayTrip->pickupAddress->addressLine2 ?> 
                                    </a><br>
                                    <a><span>Pick-up city: </span><?= $dayTrip->pickupAddress->city ?></a><br>
                                    <a><span>Pick-up county: </span><?= $dayTrip->pickupAddress->county ?></a><br>
                                    <a><span>Pick-up postcode: </span><?= $dayTrip->pickupAddress->postcode ?></a><br>
                                    <a><span>Price: </span><?= $dayTrip->price ?></a><br>
                                    <a><span>Number of available tickets: </span><?= $dayTrip->maxPassengersNum ?></a><br>
                                    <a><span>Date: </span><?= $dayTrip->date ?></a><br>
                                    <a><span>Pick-up time: </span><?= $dayTrip->pickupTime ?></a><br>
                                    <a><span>Return time: </span><?= $dayTrip->returnTime ?></a><br> 
                                </div>
                                
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php } else {?>
                <h3 style="color: red">There are no day-trips yet</h3>
            <?php } ?>
        </div>
    </body>
</html>
