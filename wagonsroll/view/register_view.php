<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>

    <body>
        <form action="../controller/register_controller.php" method="POST">
            <div>
                <label>Email:</label>
                <input name="email" type="email" required/>
            </div>
            <div>
                <label>Password:</label>
                <input name="pass" type="password" required/>
            </div>
            <div>
                <label>First name:</label>
                <input name="firstName" required/>
            </div>
            <div>
                <label>Family name:</label>
                <input name="familyName" required/>
            </div>
            <div>
                <label>Mobile:</label>
                <input name="mobile" type="tel" required/>
            </div>
            <div>
                <label>Address Line 1:</label>
                <input name="addressLine1"/>
            </div>
            <div>
                <label>Address Line 2:</label>
                <input name="addressLine2"/>
            </div>
            <div>
                <label>City:</label>
                <input name="city"/>
            </div>
            <div>
                <label>County</label>
                <input name="county"/>
            </div>
            <div>
                <label>Postcode:</label>
                <input name="postcode"/>
            </div>
            <div>
                <input type="submit" value="Register"/>
            </div>
        </form>

        <?php if(isset($_REQUEST["registerMessage"])):?>
            <p><?=$_REQUEST["registerMessage"]?></p>
        <?php endif?>
    </body>
</html>