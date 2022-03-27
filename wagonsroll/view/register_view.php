<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="../client/style/inputForm.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <div class="d-flex justify-content-center align-items-center">
            <div class="border border-2 border-primary rounded-3 p-3 w-50">
                <form class="mx-auto" action="../controller/register_controller.php" method="POST">
                    <div class="mb-4">
                        <h3 class="text-center">Register</h3>
                    </div>

                    <div class="mb-3 form-group required">
                        <label for="emailInput" class="form-label">Email</label>
                        <input class="form-control" id="emailInput" name="email" type="email" placeholder="Email" required/>
                    </div>

                    <div class="mb-3 form-group required">
                        <label for="passwordInput" class="form-label">Password</label>
                        <input class="form-control" id="passwordInput" name="pass" type="password" placeholder="Password" required/>
                    </div>

                    <div class="mb-3 form-group required">
                        <label for="firstNameInput" class="form-label">First name</label>
                        <input class="form-control" id="firstNameInput" name="firstName" placeholder="First name" required/>
                    </div>

                    <div class="mb-3 form-group required">
                        <label for="familyNameInput" class="form-label">Family name</label>
                        <input class="form-control" id="familyNameInput" name="familyName" placeholder="Family name" required/>
                    </div>

                    <div class="mb-3 form-group required">
                        <label for="mobileInput" class="form-label">Mobile</label>
                        <input class="form-control" id="mobileInput" name="mobile" type="tel" placeholder="Mobile" required/>
                    </div>

                    <div class="mb-3 form-group required">
                        <label for="addressLine1Input" class="form-label">Address Line 1</label>
                        <input class="form-control" id="addressLine1Input" name="addressLine1" placeholder="Address line 1" required/>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="addressLine2Input" class="form-label">Address Line 2</label>
                        <input class="form-control" id="addressLine2Input" name="addressLine2" placeholder="Address line 2"/>
                    </div>

                    <div class="mb-3 form-group required">
                        <label for="cityInput" class="form-label">City</label>
                        <input class="form-control" id="cityInput" name="city" placeholder="City" required/>
                    </div>

                    <div class="mb-3">
                        <label for="countyInput" class="form-label">County</label>
                        <input class="form-control" id="countyInput" name="county" placeholder="County"/>
                    </div>

                    <div class="mb-3 form-group required">
                        <label for="postcodeInput" class="form-label">Postcode</label>
                        <input class="form-control" id="postcodeInput" name="postcode" placeholder="Postcode" required/>
                    </div>

                    <div class="mb-3">
                        <input class="btn btn-primary" type="submit" value="Register"/>
                    </div>
                </form>
            </div>
        </div>

        <?php if(isset($_REQUEST["registerMessage"])):?>
            <p><?=$_REQUEST["registerMessage"]?></p>
        <?php endif?>
    </body>
</html>