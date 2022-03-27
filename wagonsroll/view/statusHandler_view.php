<!DOCTYPE html>
<html>
    <head>
        <title>Add Vehicle Status</title>
        <link rel="stylesheet" href="../client/style/general.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <?php if($status){ ?>
                <h3 style="color: green"><?=$statusText?></h3>
            <?php } else {?>
                <h3 style="color: red"><?=$statusText?></h3>
            <?php } ?>

            <button onclick="window.location.href='home_controller.php'" class="btn btn-secondary" style="margin:auto">Go to the main page</button>
        </div>
    </body>
</html>