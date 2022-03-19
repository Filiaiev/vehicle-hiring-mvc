<div style="display: flex; flex-wrap:wrap; justify-content:center">
    <?php foreach ($vehicles as $vehicle): ?>
        <div class="carblock" id="<?=$vehicle->regNum?>" style="border: 2px outset black; width:300px; margin: 5px 15px">
            <img
                src=<?= $vehicle->imageUrl ?>
                style="width: 100%; height:200px; object-fit:cover;"
            >
            <div class="vehicle-info-div" style="padding: 5px;">
                <a><?= $vehicle->model->brand->brandName ?> <?= $vehicle->model->modelName ?></a><br>
                <a><?= $vehicle->model->vehicleType->typeName ?></a><br>
                <a><?= $vehicle->maxPassengerNumber ?> seats</a><br>
                <a><?= $vehicle->dailyRate ?> per day</a><br>
                <?php if(isset($_SESSION["user"]) && $_SESSION["user"]->roleId == Role::SHOP_MANAGER) :?>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-outline-secondary btn-sm update" id="<?=$vehicle->regNum?>">Update</button>
                    </div>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach ?>
</div>