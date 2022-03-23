<!DOCTYPE html>
<html>
    <head>
        <title>Add DayTrip Status</title>
    </head>
    <body>
        <?php if($status){ ?>
            <h3 style="color: green"><?=$statusText?></h3>
        <?php } else {?>
            <h3 style="color: red"><?=$statusText?></h3>
        <?php } ?>

        <a href="eventCoordinator_controller.php">Go to the main page</a>
    </body>
</html>