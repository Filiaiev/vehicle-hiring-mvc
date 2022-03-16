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
		<link rel="stylesheet" href="../client/style/search.css"/>
    </head>
<body>

<br>
<?php require_once "block/directSearch.php" ?>
<br>
<br>

<?php require_once "block/filterDisplay.php" ?>

<br>
<br>

<?php require_once "block/vehicleDisplay.php" ?>

<button>Add to Basket</button>

<hr>
<form action="" method="get">
    <label for="startdate">Enter Start Date:</label>
    <input type="date" id="startdate" name="startdate"><br>
    <label for="enddate">Enter End Date:</label>
    <input type="date" id="enddate" name="enddate"><br>
    <input type="submit" value="Book">
</form>
</div>

</body>
</html>

