<div style="display: flex; flex-wrap:wrap; justify-content:center">
    <?php foreach ($allVehicles as $vehicle): ?>
        <div class="carblock" style="border: 2px outset black; width:300px; margin: 5px 15px">
            <img
                src=<?= $vehicle->imageUrl ?>
                style="width: 100%; height:200px; object-fit:cover "
            >
            <div style="padding: 5px">
                <a><?= $vehicle->model->brand->brandName ?> <?= $vehicle->model->modelName ?></a><br>
                <a><?= $vehicle->model->vehicleType->typeName ?></a><br>
                <a><?= $vehicle->maxPassengerNumber ?> seats</a><br>
                <a><?= $vehicle->dailyRate ?> per day</a><br>
            </div>
        </div>
    <?php endforeach ?>
</div>