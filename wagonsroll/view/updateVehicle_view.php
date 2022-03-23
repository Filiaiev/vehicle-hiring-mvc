<!DOCTYPE html>
<html>
    <head>
        <title>Update vehicle</title>
    </head>
    <body>
        <button onclick="window.location.href='home_controller.php'">Back Home</button>
        <img 
            src=<?= $vehicle->imageUrl ?> 
            style="max-width:50%"
        >
        <br>
        <form method="post" action="updateVehicle_controller.php">
            <input type="hidden" name="oldRegNum" value="<?= $vehicle->regNum ?>"></input>
            <h3><?= $vehicle->model->brand->brandName ?> <?= $vehicle->model->modelName ?></h3>
            <h4>Type: <?= $vehicle->model->vehicleType->typeName ?></h4>
            Regestration number: <input type="text" name="regNum" value="<?= $vehicle->regNum ?>"></input><br>
            Image URL: <input type="text" name="imageUrl" value="<?= $vehicle->imageUrl ?>"></input><br>
            Max passenger number: <input type="text" name="maxPassengerNumber" value="<?= $vehicle->maxPassengerNumber ?>"></input><br>
            Daily rate: <input type="text" name="dailyRate" value="<?= $vehicle->dailyRate ?>"></input><br>
            <input type="submit" name="save" value="Save"></button>
        </form>
    </body>
</html>
