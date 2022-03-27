<!DOCTYPE html>
<html>
    <head>
        <title>Manager Homepage</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="../client/js/home/updateVehicle.js"></script>
        <script type="text/javascript" src="../client/js/home/inputs.js"></script>
		<script type="text/javascript" src="../client/js/home/search.js"></script>
        <script src="https://use.fontawesome.com/47474f8808.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../client/style/general.css"/>
        <link rel="stylesheet" href="../client/style/search.css"/>
        <link rel="stylesheet" href="../client/style/filter.css"/>
        <link rel="stylesheet" href="../client/style/header.css"/>
        <link rel="stylesheet" href="../client/style/homeManager.css"/>
    </head>
    <body>
        <?php require_once "block/header.php" ?>
        <div class="container-fluid">
            <h3 style="text-align: center">Add new vehicle:</h3>
            <div class="add-vehicle-form">
                <form method="post" action="addVehicle_controller.php">
                    <input type="text" name="regNum" placeholder="Registration number"/><br>
                    <input type="text" name="brand" placeholder="Brand"/><br>
                    <input type="text" name="model" placeholder="Model"/><br>
                    <?php foreach ($vehiclesTypes as $i => $type): ?>
                        <div>
                            <label for="vehicle-type-<?=$i ?>"><?= $type->typeName ?></label>
                            <input type="radio" name="type" value="<?= $type->typeName ?>" id="vehicle-type-<?=$i ?>">
                        </div>
                    <?php endforeach ?>
                    <input type="text" name="dailyRate" placeholder="Daily rate"/><br>
                    <input type="text" name="maxPassengerNumber" placeholder="Max passenger number"/><br>
                    <input type="text" name="imageUrl" placeholder="Image URL"/><br>
                    <input class="btn btn-secondary mt-1" type="submit" value="Add vehicle">
                </form>
            </div>

            <br>
            <br>
            <?php require_once "block/directSearch.php" ?>
            <br>

            <?php require_once "block/filterDisplay.php" ?>

            <h3>List of vehicles:</h3>
            <?php require_once "block/vehicleDisplay.php" ?>
        </div>
    </body>
</html>
