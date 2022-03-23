<?php
    const IN_FILTERS = array(
        "brandId" => "Brand",
        "vehicleTypeId" => "Model",
        "licenseTypeId" => "DriverLicenseType"
    );

    const BETWEEN_FILTERS = array(
        "maxPassengerNumber" => "Vehicle",
        "dailyRate" => "Vehicle",
        // "availableDate" => "VehiclesBookingItem"
    );

    const AVAILABLE_FILTERS = array(
        "in" => IN_FILTERS,
        "between" => BETWEEN_FILTERS
    );
?>