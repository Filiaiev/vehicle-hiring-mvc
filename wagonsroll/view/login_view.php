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

        <?php if(isset($_REQUEST["loginStatus"]) && $_REQUEST["loginStatus"] == false): ?>
            <p>Invalid credentials</p>
        <?php endif?>
    </body>
</html>