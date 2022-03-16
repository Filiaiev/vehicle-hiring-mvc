<?php
    require_once "../dao/brandDAO.php";
    require_once "../dao/vehicleTypeDAO.php";
	require_once "../dao/driverLicenseTypeDAO.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Wagons Roll</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script type="text/javascript" src="../client/js/home/search.js"></script>
        <script type="text/javascript" src="../client/js/home/inputs.js"></script>
        <script src="https://use.fontawesome.com/47474f8808.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="../client/style/search.css"/>
    </head>
    <body>
        <?php require_once "block/header.php" ?>
        <ul class="nav nav-tabs nav-fill" style="margin-bottom:30px">
            <li class="nav-item">
                <a class="nav-link active" href="home_controller.php">Vehicles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Daytrips</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Basket</a>
            </li>
        </ul>

        <div class="container-fluid">
            <?php require_once "block/directSearch.php" ?>
            <br>
            <?php require_once "block/directSearch.php" ?>
            <br>
            <br>

            <?php require_once "block/filterDisplay.php" ?>

            <br>
            <br>

            <?php require_once "block/vehicleDisplay.php" ?>

            <button class="btn btn-secondary mt-1">Add to Basket</button>

            <hr>
            <form action="" method="get">
                <label for="startdate">Enter Start Date:</label>
                <input type="date" id="startdate" name="startdate"><br>
                <label for="enddate">Enter End Date:</label>
                <input type="date" id="enddate" name="enddate"><br>
                <input type="submit" class="btn btn-secondary mt-1" value="Book">
            </form>
        </div>
    </body>
</html>
