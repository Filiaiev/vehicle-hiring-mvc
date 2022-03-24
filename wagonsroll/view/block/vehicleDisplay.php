<div style="display: flex; flex-wrap:wrap; justify-content:center">
    <?php foreach ($vehicles as $vehicle) : ?>
        <div class="carblock" id="<?= $vehicle->regNum ?>" style="border: 2px outset black; width:300px; margin: 5px 15px">
            <img src=<?= $vehicle->imageUrl ?> style="width: 100%; height:200px; object-fit:cover;">
            <div class="vehicle-info-div" style="padding: 5px;">
                <a><?= $vehicle->model->brand->brandName ?> <?= $vehicle->model->modelName ?></a><br>
                <a><?= $vehicle->model->vehicleType->typeName ?></a><br>
                <a><?= $vehicle->maxPassengerNumber ?> seats</a><br>
                <a><?= $vehicle->dailyRate ?> per day</a><br>

                <?php if (!isset($_SESSION["user"]) || (isset($_SESSION["user"]) && $_SESSION["user"]->roleId == Role::CUSTOMER)) : ?>
                    <label for="startdate">Enter Booking Start Date:</label>
                    <input type="date" id="startDate<?= str_replace(' ', '', $vehicle->regNum) ?>" name="startDate" class='form-control' value=''><br>
                    <label for="enddate">Enter Booking End Date:</label>
                    <input type="date" id="endDate<?= str_replace(' ', '', $vehicle->regNum) ?>" name="endDate" class='form-control' value=''><br>

                    <!-- hidden inputs for parsing via jquery ajax where i create unique ids -->
                    <input type='hidden' name='imageUrl' id='imageUrl<?= str_replace(' ', '', $vehicle->regNum) ?>' value='<?= $vehicle->imageUrl ?>'>
                    <input type='hidden' name='dailyRate' id='dailyRate<?= str_replace(' ', '', $vehicle->regNum) ?>' value='<?= $vehicle->dailyRate ?>'>
                    <input type='hidden' name='brandName' id='brandName<?= str_replace(' ', '', $vehicle->regNum) ?>' value='<?= $vehicle->model->brand->brandName ?>'>
                    <input type='hidden' name='modelName' id='modelName<?= str_replace(' ', '', $vehicle->regNum) ?>' value='<?= $vehicle->model->modelName ?>'>
                    <input type='hidden' name='typeName' id='typeName<?= str_replace(' ', '', $vehicle->regNum) ?>' value='<?= $vehicle->model->vehicleType->typeName ?>'>
                    <input type='hidden' name='maxPassengerNumber' id='maxPassengerNumber<?= str_replace(' ', '', $vehicle->regNum) ?>' value='<?= $vehicle->maxPassengerNumber ?>'>

                    <input type='submit' name='add_to_cart' class='btn btn-warning my-2 add' value='Add To cart' id='<?= str_replace(' ', '', $vehicle->regNum) ?>'>
                <?php endif ?>

                <?php if (isset($_SESSION["user"]) && $_SESSION["user"]->roleId == Role::SHOP_MANAGER) : ?>
                    <button id="<?= $vehicle->regNum ?>" class="update">Update</button>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach ?>
</div>