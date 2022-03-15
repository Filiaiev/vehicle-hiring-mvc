<!DOCTYPE html>
<html>
    <head>
        <title>Manager Homepage</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script type="text/javascript" src="../service/updateVehicle.js"></script>
    </head>
    <body>
        <h3>Add new vehicle:</h3>
        <form method="post" action="addVehicle_controller.php">
            <input type="text" name="regNum" placeholder="Registration number"/><br>
            <input type="text" name="brand" placeholder="Brand"/><br>
            <input type="text" name="model" placeholder="Model"/><br>
            <?php foreach ($allVehicleTypes as $type): ?>
                <input type="radio" name="type" value="<?= $type->typeName ?>" id="<?= $type->typeName ?>">
                <label for="<?= $type->typeName ?>"><?= $type->typeName ?></label><br>
            <?php endforeach ?>
            <input type="text" name="dailyRate" placeholder="Daily rate"/><br>
            <input type="text" name="maxPassengerNumber" placeholder="Max passenger number"/><br>
            <input type="text" name="imageUrl" placeholder="Image URL"/><br>
            <input type="submit" value="Add vehicle">
        </form>

        <h3>List of vehicles:</h3>
        <div style="display: flex; flex-wrap:wrap; justify-content:center">
            <?php foreach ($allVehicles as $vehicle): ?>
                <div class="carblock" style="border: 2px outset black; width:300px; margin: 5px 15px">
                    <img
                        src=<?= $vehicle->imageUrl ?>
                        style="width: 100%; height:200px; object-fit:cover "
                    >
                    <div style="padding: 5px">
                        <a><?= $vehicle->model->brand->brandName ?> <?= $vehicle->model->modelName ?></a><br>
                        <a><?= $vehicle->model->vehicleType->typeName ?></a><br>
                        <a><?= $vehicle->maxPassengerNumber ?> seats</a><br>
                        <a><?= $vehicle->dailyRate ?> per day</a><br>
                        <a>Available since 12.02.2021</a><br>
                        <!-- missing onclick() as of now -->
                        <button class="update" id="<?=$vehicle->regNum?>">Update</button>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </body>
</html>
