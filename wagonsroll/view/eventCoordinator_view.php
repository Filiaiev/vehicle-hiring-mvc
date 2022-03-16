<!DOCTYPE html>
<html>
    <head>
        <title>Event Coordinator Homepage</title>
        <script src="https://use.fontawesome.com/47474f8808.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php require_once "block/header.php" ?>
        <div class="container-fluid">
            <h3>Add new day-trip:</h3>
            <form method="post" action="addDayTrip.php">
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
                <input type="submit" class="btn btn-secondary mt-1" value="Add a new trip">
            </form>

            <h3>List of day-trips:</h3>
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
        </div>
    </body>
</html>
