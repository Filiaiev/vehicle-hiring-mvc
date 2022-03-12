<?php
    require_once "../dao/brandDAO.php";
    require_once "../dao/vehicleTypeDAO.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Wagons Roll</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="../service/home_service.js"></script>
    </head>
<body>

<br>
<!--    -->
<!-- action will be a .php file    -->
<form action="" method="get">
    <input type="text" id="" name="search" placeholder="Enter car name, model, brand" size="40"><br>
    <input type="submit" hidden>
</form> 

<!-- so far this button is just to be aware of, 
there should be onclick = "function()" parameter here 
but I don't add js as of now-->
<button>Search</button>
<br>
<br>
<!-- there will be quite a few filters here but
considering we haven't yet decided the way we're gonna 
implement them, I didn't do more than the most usual-->
<div class="filter" style="border: 2px outset black; width:250px;">
	<h3 style="text-align: center;">Filter</h3>
	<hr>

	<form id="filter" action="../controller/home_controller.php" method="GET">
		<div class="filter-block">
			<h4>Brand name</h4>
			<?php foreach(BrandDAO::getInstance()->getAllBrands() as $i => $brand): ?>
				<div>
					<label><?=$brand->brandName?></label>
					<input id="brand-name-<?=$i?>" type="checkbox" name="brandName[]" value="<?=$brand->brandName?>"/>
				</div>
			<?php endforeach ?>
		</div>

		<div class="filter-block">
			<h4>Vehicle type</h4>
			<?php foreach(VehicleTypeDAO::getInstance()->getAllVehicleTypes() as $i => $vtype): ?>
				<div>
					<label><?=$vtype->typeName?></label>
					<input id="type-name-<?=$i?>" type="checkbox" name="typeName[]" value="<?=$vtype->typeName?>"/>
				</div>
			<?php endforeach ?>
		</div>

		<div class="filter-block">
			<h4>Passengers number</h4>
			<input id="passengers-num-from" type="number" name="passengersNum[]" placeholder="From"/>
			<input id="passengers-num-to" type="number" name="passengersNum[]" placeholder="To"/>
		</div>

		<div class="filter-block">
			<h4>Daily rate</h4>
			<input id="daily-rate-from" type="number" name="dailyRate[]" placeholder="From"/>
			<input id="daily-rate-to" type="number" name="dailyRate[]" placeholder="To"/>
		</div>

		<div class="filter-block">
			<h4>Availability dates</h4>
			<input id="available-date-from" type="date" name="availableDate[]" placeholder="From"/>
			<input id="available-date-to" type="date" name="availableDate[]" placeholder="To"/>
		</div>

		<input type="submit" value="Search"/>
		<button id="clear-filter-btn" type="reset">Clear</button>
	</form>
</div>

<a href="google.com">More..</a>
</div>

<br>
<br>

<div class="carblock" style="border: 2px outset black; width:300px;">
<img src="https://media.autoexpress.co.uk/image/private/s--wqUB0fzD--/f_auto,t_content-image-full-mobile@1/v1645649253/autoexpress/2022/02/BMW-X1_xf13cc.jpg" style="width: 100%;">
<a>BMW X1 Aut.</a><br>
<a>Car</a><br>
<a>5 seats</a><br>
<a>183/day</a><br>
<a>Available since 12.02.2021</a><br>
<!-- missing onclick() as of now -->
<button>Add to Basket</button>

<!-- post button press -->
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

