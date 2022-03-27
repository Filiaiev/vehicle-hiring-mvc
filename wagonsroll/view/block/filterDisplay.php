<div class="filter">
	<div class="container">
		<h3 style="text-align: center;">Filter</h3>
		<hr>

		<form id="filter" action="../controller/home_controller.php" method="GET">
			<div id='filterblocks'>
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
			</div>
			<!-- <div class="filter-block"></div>
				<h4>Availability dates</h4>
				<input id="available-date-from" type="date" name="availableDate[]" placeholder="From"/>
				<input id="available-date-to" type="date" name="availableDate[]" placeholder="To"/>
			</div> -->

			<input type="submit" class="btn btn-secondary mt-1" value="Search"/>
			<button id="clear-filter-btn" class="btn btn-outline-secondary mt-1" type="reset">Reset</button>
		</form>
	</div>
</div>