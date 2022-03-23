<!DOCTYPE html>
<html>
    <head>
        <title>Contact form</title>
    </head>

    <body>
        <form action="../controller/contactForm_controller.php" method="POST">
            <h3>Contact details</h3>
            <div>
                <label>First name:</label>
                <input name="firstName" placeholder="Ben"
                       value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->firstName : '' ?>" required/>
            </div>
            <div>
                <label>Family name:</label>
                <input name="familyName" 
                       value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->familyName : '' ?>"
                       placeholder="Jones" required/>
            </div>
            <div>
                <label>Mobile:</label>
                <input type="tel" name="mobile" 
                       value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->mobile : '' ?>"
                       placeholder="+441122334455" required/>
            </div>
            <div>
                <label>Email:</label>
                <input type="email" name="email" 
                       value="<?=isset($_SESSION['user']) ? $_SESSION['user']->email : '' ?>"
                       placeholder="sample@domain.com" required/>
            </div>

            <h3>Address details</h3>
            <div>
                <label>Address Line 1:</label>
                <input name="addressLine1" 
                       value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->address->addressLine1 : '' ?>"
                       placeholder="55 Sample Street" required/>
            </div>
            <div>
                <label>Address Line 2:</label>
                <input name="addressLine2" 
                       value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->address->addressLine2 : '' ?>"
                       placeholder="apt. 5"/>
            </div>
            <div>
                <label>City:</label>
                <input name="city"
                       value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->address->city : '' ?>"
                       placeholder="Sample City" required/>
            </div>
            <div>
                <label>County</label>
                <input name="county"
                       value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->address->county : '' ?>"
                       placeholder="Sample County"/>
            </div>
            <div>
                <label>Postcode:</label>
                <input name="postcode"
                       value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->address->postcode : '' ?>"
                       placeholder="KT1 1SQ" required/>
            </div>

            <?php if(!isset($_SESSION['user'])) : ?>
                <a href="login_controller.php?location=<?=htmlspecialchars($_SERVER['REQUEST_URI'])?>">Have an account? Log in</a>
            <?php endif ?>
            
            <input type="submit" value="Proceed to checkout"/>
        </form>
    </body>
</html>