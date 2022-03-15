<!DOCTYPE html>
<html>
    <head>
        <title>Manager Homepage</title>
    </head>
    <body>
        <h3>Add new vehicle:</h3>
        <form method="post" action="addvehicle.php">
            <input type="text" name="brand" placeholder="Brand"/><br>
            <input type="text" name="model" placeholder="Model"/><br>
            <?php foreach ($allVehicleTypes as $type): ?>
                <input type="radio" name="type" value="<?= $type->typeName ?>" id="<?= $type->typeName ?>">
                <label for="<?= $type->typeName ?>"><?= $type->typeName ?></label><br>
            <?php endforeach ?>
            <input type="text" name="dailyRate" placeholder="Daily rate"/><br>
            <input type="text" name="maxPassengerNumber" placeholder="Max passenger number"/><br>
            <input type="submit" value="Add vehicle">
        </form>

        <h3>List of vehicles:</h3>
        <?php require_once "../view/block/vehicleDisplay.php" ?>
    </body> 
</html>
