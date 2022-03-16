<!DOCTYPE html>
<html>
    <head>
        <title>Manager Homepage</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="../client/js/home/updateVehicle.js"></script>
        <script type="text/javascript" src="../client/js/home/inputs.js"></script>
		<script type="text/javascript" src="../client/js/home/search.js"></script>
		<link rel="stylesheet" href="../client/style/search.css"/>
    </head>
    <body>
        <h3>Add new vehicle:</h3>
        <form method="post" action="addVehicle_controller.php">
            <input type="text" name="regNum" placeholder="Registration number"/><br>
            <input type="text" name="brand" placeholder="Brand"/><br>
            <input type="text" name="model" placeholder="Model"/><br>
            <?php foreach ($vehiclesTypes as $type): ?>
                <input type="radio" name="type" value="<?= $type->typeName ?>" id="<?= $type->typeName ?>">
                <label for="<?= $type->typeName ?>"><?= $type->typeName ?></label><br>
            <?php endforeach ?>
            <input type="text" name="dailyRate" placeholder="Daily rate"/><br>
            <input type="text" name="maxPassengerNumber" placeholder="Max passenger number"/><br>
            <input type="text" name="imageUrl" placeholder="Image URL"/><br>
            <input type="submit" value="Add vehicle">
        </form>

        <br>
        <br>
        <?php require_once "block/directSearch.php" ?>
        <br>

        <?php require_once "block/filterDisplay.php" ?>

        <h3>List of vehicles:</h3>
        <?php require_once "block/vehicleDisplay.php" ?>
    </body>
</html>
