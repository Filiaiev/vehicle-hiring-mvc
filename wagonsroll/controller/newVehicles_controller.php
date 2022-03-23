<?php
    require_once "../dao/vehicleDAO.php";

    $newVehicles = VehicleDAO::getInstance()->getNewVehicles();

    $index = 0;
    foreach ($newVehicles as $vehicle) {
        $brandName = $vehicle->model->brand->brandName;
        $modelName = $vehicle->model->modelName;
        if($index == 0){
            echo "<div class=\"carousel-item active\" id=\"$vehicle->regNum\">";
        } else {
            echo "<div class=\"carousel-item\" id=\"$vehicle->regNum\">";
        }
        echo "<img src=$vehicle->imageUrl class=\"d-block w-100\" style=\"max-height:600px\" alt=\"Vehicle image\">";
        echo "<div style=\"display:flex; justify-content:center\">";
        echo     "<div style=\"display:flex; flex-direction:column\">";
        echo         "<h5 style=\"text-align:center\">$brandName $modelName</h5>";
        echo         "<p style=\"text-align:center\">$vehicle->maxPassengerNumber seats / $vehicle->dailyRate per day</p>";
        echo         "<button type=\"button\" class=\"btn btn-secondary\">Add to basket</button>";
        echo    " </div>";
        echo "</div>";
        echo "</div>";

        $index++;
    }
?>
