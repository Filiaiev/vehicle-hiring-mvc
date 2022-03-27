<!DOCTYPE html>
<html>
    <head>
        <title>Update vehicle</title>
        <link rel="stylesheet" href="../client/style/general.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <div style="padding: 10px; display:flex; justify-content:center; flex-wrap: wrap;">
                <img 
                    src=<?= $vehicle->imageUrl ?> 
                    style="max-width:50%; margin-right:20px"
                    alt="Image of <?= $vehicle->model->brand->brandName ?> <?= $vehicle->model->modelName ?>"
                    title = "<?= $vehicle->model->brand->brandName ?> <?= $vehicle->model->modelName ?>"
                >
                <br>
                <form method="post" action="updateVehicle_controller.php">
                    <input type="hidden" name="oldRegNum" value="<?= $vehicle->regNum ?>"></input>
                    <h3><?= $vehicle->model->brand->brandName ?> <?= $vehicle->model->modelName ?></h3>
                    <h4>Type: <?= $vehicle->model->vehicleType->typeName ?></h4>
                    Regestration number: <input type="text" name="regNum" value="<?= $vehicle->regNum ?>" placeholder="Registration number"></input><br>
                    Image URL: <input type="text" name="imageUrl" value="<?= $vehicle->imageUrl ?>" placeholder="Image URL"></input><br>
                    Max passenger number: <input type="text" name="maxPassengerNumber" value="<?= $vehicle->maxPassengerNumber ?>" placeholder="Max Passenger Number"></input><br>
                    Daily rate: <input type="text" name="dailyRate" value="<?= $vehicle->dailyRate ?>" placeholder="Daily Rate"></input><br>
                    <input type="submit" name="save" value="Save" class="btn btn-secondary"></button>
                </form>
            </div>
            <div style="display:flex; justify-content:center">
                <button onclick="window.location.href='home_controller.php'" class="btn btn-secondary" style="margin:auto">Back Home</button>
            </div>
        </div>
    </body>
</html>
