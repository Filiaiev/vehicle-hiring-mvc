<!DOCTYPE html>
<html>
    <head>
        <title>Contact form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="../client/style/inputForm.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <div class="d-flex justify-content-center align-items-center">
            <div class="border border-2 border-primary rounded-3 p-3 w-50">
                <div class="mb-3">
                    <h3 class="text-center">Fill in your details to complete booking</h3>
                </div>

                <?php if(!isset($_SESSION['user'])) : ?>
                    <p class="text-center text-bold">Have an account? <a class="btn btn-primary" href="login_controller.php?location=<?=htmlspecialchars($_SERVER['REQUEST_URI'])?>">Log in</a></p>
                <?php endif ?>

                <form class="mx-auto" action="../controller/contactForm_controller.php" method="POST">
                    <div class="mb-3 form-group required">
                        <label class="form-label">First name</label>
                        <input class="form-control" name="firstName" placeholder="First name"
                               value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->firstName : '' ?>" required/>
                    </div>

                    <div class="mb-3 form-group required">
                        <label class="form-label">Family name</label>
                        <input class="form-control" name="familyName" 
                               value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->familyName : '' ?>"
                               placeholder="Family name" required/>
                    </div>

                    <div class="mb-3 form-group required">
                        <label class="form-label">Mobile</label>
                        <input class="form-control" type="tel" name="mobile" 
                               value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->mobile : '' ?>"
                               placeholder="Mobile" required/>
                    </div>

                    <div class="mb-3 form-group required">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" 
                               value="<?=isset($_SESSION['user']) ? $_SESSION['user']->email : '' ?>"
                               placeholder="Email" required/>
                    </div>
                    
                    <hr class="bg-primary border-2 border-top border-primary">
                    
                    <div class="mb-3 form-group required">
                        <label class="form-label">Address Line 1</label>
                        <input class="form-control" name="addressLine1" 
                               value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->address->addressLine1 : '' ?>"
                               placeholder="Address line 1" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address Line 2</label>
                        <input class="form-control" name="addressLine2" 
                               value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->address->addressLine2 : '' ?>"
                               placeholder="Address line 2"/>
                    </div>

                    <div class="mb-3 form-group required">
                        <label class="form-label">City</label>
                        <input class="form-control" name="city"
                               value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->address->city : '' ?>"
                               placeholder="City" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">County</label>
                        <input class="form-control" name="county"
                               value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->address->county : '' ?>"
                               placeholder="County"/>
                    </div>

                    <div class="mb-3 form-group required">
                        <label class="form-label">Postcode</label>
                        <input class="form-control" name="postcode"
                               value="<?=isset($_SESSION['contactDetails']) ? $_SESSION['contactDetails']->address->postcode : '' ?>"
                               placeholder="Postcode" required/>
                    </div>
        
                    <div class="mb-3">
                        <input class="w-100 btn btn-primary" type="submit" value="Proceed to checkout"/>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>