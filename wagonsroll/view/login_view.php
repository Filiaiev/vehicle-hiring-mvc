<?php
    require_once "../config/dbConfig.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>

    <body>
        <form action="../controller/login_controller.php" method="POST">
            <input name="email" placeholder="email@domain"/>
            <input name="pass" type="password" placeholder="password"/>
            <input type="submit" value="Login"/>
            <?php if(isset($_GET["location"])) : ?>
                <input type="hidden" name="location" value="<?=$_GET["location"] ?>"/>
            <?php endif ?>
        </form>

        <button onclick="location.href='register_controller.php'">Register</button>

        <?php if(isset($message)): ?>
            <p><?=$message?></p>
        <?php endif?>
        
        <?php if(isset($_REQUEST["registerMessage"])) :?>
            <p><?=$_REQUEST["registerMessage"]?></p>
        <?php endif?>
    </body>
</html>