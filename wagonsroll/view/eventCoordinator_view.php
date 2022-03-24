<!DOCTYPE html>
<html>
    <head>
        <title>Event Coordinator Homepage</title>
    </head>
    <body>
        <h3>Add new day-trip:</h3>
        <form method="post" action="addDayTrip_controller.php">
            <input type="text" name="addressLine1" placeholder="Pick-up address Line1"/><br>
            <input type="text" name="addressLine2" placeholder="Pick-up address Line2"/><br>
            <input type="text" name="city" placeholder="Pick-up city"/><br>
            <input type="text" name="county" placeholder="Pick-up county"/><br>
            <input type="text" name="postcode" placeholder="Pick-up postcode"/><br>
            <input type="text" name="venue" placeholder="Venue"/><br>
            <input type="text" name="price" placeholder="Price"/><br>
            <input type="text" name="maxPassengersNum" placeholder="Max passenger number"/><br>
            <input type="date" name="date" placeholder="Date"/><br>
            <input type="time" name="pickupTime" placeholder="pickup Time"/><br>
            <input type="time" name="returnTime" placeholder="return Time"/><br>
            <input type="submit" value="Add a new trip">
        </form>

        <h3>List of day-trips:</h3>
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
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        <?php } else {?>
            <h3 style="color: red">There are no day-trips yet</h3>
        <?php } ?>
    </body>
</html>
