<?php
    require_once "../config/dbConfig.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="../client/style/general.css" rel="stylesheet">
        <link rel="stylesheet" href="../client/style/header.css"/>
        <script src="https://use.fontawesome.com/47474f8808.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php require_once "block/header.php" ?>

        <div class="d-flex vh-100 justify-content-center align-items-center">
            <div class="border border-2 border-secondary rounded-3 p-3 w-50">
                <form class="mx-auto" action="../controller/login_controller.php" method="POST">
                    <div class="mb-4">
                        <h3 class="text-center">Sign in</h3>
                    </div>
    
                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email</label>
                        <input class="form-control" id="emailInput" type="email" name="email" placeholder="Email" required autocomplete="on"/>
                    </div>
        
                    <div class="mb-3">
                        <label for="passwordInput" class="form-label">Password</label>
                        <input class="form-control" id="passwordInput" name="pass" type="password" placeholder="Password" required/>
                    </div>
                    
                    <div class="mb-3">
                        <input class="w-100 btn btn-secondary" type="submit" value="Sign in"/>
                    </div>
        
                    <?php if(isset($_GET["location"])) : ?>
                        <input type="hidden" name="location" value="<?=$_GET["location"] ?>"/>
                    <?php endif ?>
                </form>

                <div class="mb-3 text-center">
                    <p>Don`t have an account? <a class="link-secondary" href="register_controller.php">Click to register</a></p>
                </div>

                <?php if(isset($message)): ?>
                    <p class="text-warning text-center"><?=$message?></p>
                <?php endif?>
            </div>
        </div>
    </body>
</html>