<?php foreach ($newVehicles as $vehicle) {
    $brandName = $vehicle->model->brand->brandName;
    $modelName = $vehicle->model->modelName;

if($index == 0){ ?>
    <div class="carousel-item active" id="<?= $vehicle->regNum ?>">
<?php } else { ?>
    <div class="carousel-item" id="<?= $vehicle->regNum ?>">
<?php } ?>
    <img 
        src=<?= $vehicle->imageUrl ?> 
        class="d-block w-100" 
        style="max-height:600px" 
        alt="Image of <?= $brandName ?> <?= $modelName ?>"
        title = "<?= $brandName ?> <?= $modelName ?>"
    >
    <div style="display:flex; justify-content:center">
        <div style="display:flex; flex-direction:column">
            <h5 style="text-align:center"><?= $brandName ?> <?= $modelName ?></h5>
            <p style="text-align:center"><?= $vehicle->maxPassengerNumber ?> seats / <?= $vehicle->dailyRate ?> per day</p>
        </div>
    </div>
</div>

<?php 
    $index++;
}?>

