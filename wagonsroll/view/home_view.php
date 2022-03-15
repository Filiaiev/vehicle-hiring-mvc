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
		<link rel="stylesheet" href="../client/style/search.css";
    </head>
<body>

<br>
<form id="fullname-search-form" action="../controller/home_controller.php" method="get">
    <input id="direct-search" type="text" name="search" autocomplete="off" placeholder="Start typing (eg. BMW or Camry)" size="40"><br>
	<div class="hints">
	</div>
    <input type="submit" value="Search">
</form> 

<br>
<br>

<div class="filter" style="border: 2px outset black; width:250px;">
	<h3 style="text-align: center;">Filter</h3>
	<hr>

	<form id="filter" action="../controller/home_controller.php" method="GET">
		<div class="filter-block">
			<h4>Brand name</h4>
			<?php foreach(BrandDAO::getInstance()->getAllBrands() as $i => $brand): ?>
				<div>
					<label><?=$brand->brandName?></label>
					<input id="brand-name-<?=$i?>" type="checkbox" name="brandId[]" value="<?=$brand->brandId?>"/>
				</div>
			<?php endforeach ?>
		</div>

		<div class="filter-block">
			<h4>Vehicle type</h4>
			<?php foreach(VehicleTypeDAO::getInstance()->getAllVehicleTypes() as $i => $vtype): ?>
				<div>
					<label><?=$vtype->typeName?></label>
					<input id="type-name-<?=$i?>" type="checkbox" name="vehicleTypeId[]" value="<?=$vtype->vehicleTypeId?>"/>
				</div>
			<?php endforeach ?>
		</div>

		<div class="filter-block">
			<h4>License type</h4>
			<?php foreach(DriverLicenseTypeDAO::getInstance()->getAllDriverLicenseTypes() as $i => $dltype): ?>
				<div>
					<label><?=$dltype->licenseTypeName?></label>
					<input id="license-type-name-<?=$i?>" type="checkbox" name="licenseTypeId[]" value="<?=$dltype->licenseTypeId?>"/>
				</div>
			<?php endforeach ?>
		</div>

		<div class="filter-block">
			<h4>Passengers number</h4>
			<input id="passengers-num-from" type="number" name="maxPassengerNumber[]" placeholder="From"/>
			<input id="passengers-num-to" type="number" name="maxPassengerNumber[]" placeholder="To"/>
		</div>

		<div class="filter-block">
			<h4>Daily rate</h4>
			<input id="daily-rate-from" type="number" name="dailyRate[]" placeholder="From"/>
			<input id="daily-rate-to" type="number" name="dailyRate[]" placeholder="To"/>
		</div>

		<!-- <div class="filter-block"></div>
			<h4>Availability dates</h4>
			<input id="available-date-from" type="date" name="availableDate[]" placeholder="From"/>
			<input id="available-date-to" type="date" name="availableDate[]" placeholder="To"/>
		</div> -->

		<input type="submit" value="Filter"/>
		<button id="clear-filter-btn" type="reset">Reset</button>
	</form>
</div>

<a href="google.com">More..</a>
</div>

<br>
<br>

<?php require_once "../view/block/vehicleDisplay.php" ?>

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

