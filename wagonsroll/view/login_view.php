<?php
    require_once "../config/webConfig.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>

    <body>
        <form action="../controller/login_controller.php" method="POST">
            <input name="email" placeholder="email@domain"/>
            <input name="pass" placeholder="password"/>
            <input type="submit" value="Login"/>
        </form>

        <button onclick="location.href='register_controller.php'">Register</button>

        <?php if(isset($_REQUEST["loginStatus"]) && $_REQUEST["loginStatus"] == false): ?>
            <p>Invalid credentials</p>
        <?php endif?>
        
        <?php if(isset($_REQUEST["registerMessage"])) :?>
            <p><?=$_REQUEST["registerMessage"]?></p>
        <?php endif?>
    </body>
</html>