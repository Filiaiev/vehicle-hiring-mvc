<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>

    <body>
        <h2>Home page. Welcome, <?=$_SESSION["user"]->email?>!</h2>
        <form action="../controller/logout_controller.php" method="POST">
            <input type="submit" value="Logout"/>
        </form>
    </body>
</html>