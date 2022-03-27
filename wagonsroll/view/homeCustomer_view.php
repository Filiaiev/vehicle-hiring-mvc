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
        <script type="text/javascript" src="../client/js/home/addToCart.js"></script>
        <script type="text/javascript" src="../client/js/home/newVehicles.js"></script>

        <script src="https://use.fontawesome.com/47474f8808.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../client/style/general.css"/>
        <link rel="stylesheet" href="../client/style/search.css"/>
        <link rel="stylesheet" href="../client/style/filter.css"/>
        <link rel="stylesheet" href="../client/style/header.css"/>
    </head>
    <body>
        <?php require_once "block/header.php" ?>
        <ul class="nav nav-tabs nav-fill">
            <li class="nav-item">
                <a class="nav-link active" href="home_controller.php">Homepage</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="userDayTrips_controller.php">Daytrips</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cart_controller.php">Basket</a>
            </li>
        </ul>
        <div class="container-fluid">
            <br>
            <?php require_once "block/directSearch.php" ?> <br> <br>

            <?php require_once "block/filterDisplay.php" ?> <br> <br>

            <h4 class = "instruction">If you want to book a vehicle for 1 day, please input its booking start and end dates as the same date.</h4>

            <?php require_once "block/vehicleDisplay.php" ?>

            <hr>

            <h2 style="text-align:center">New vehicles:</h2>
            <div style="display:flex; justify-content:center; margin-bottom:10px">
                <div style="position:relative" id="carouselExampleDark" class="carousel carousel-dark slide w-75" data-bs-ride="carousel" style="margin-bottom:30px">
                    <div class="carousel-indicators" style="position:absolute; bottom:85px">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    </div>
                    <div class="carousel-inner"></div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>
