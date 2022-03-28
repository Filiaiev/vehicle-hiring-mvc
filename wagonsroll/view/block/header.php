<nav class="navbar navbar-light header">
    <div class="container-fluid">
        <a class="navbar-brand" href="../controller/home_controller.php">
            <img 
                src="https://www.kindpng.com/picc/m/140-1404603_sports-car-logo-car-logo-png-vector-transparent.png" 
                alt="car logo"
                title = "car logo"
                width="65" height="27" 
                class="d-inline-block align-text-top" 
                id="dropdownMenuButton1" 
                data-bs-toggle="dropdown" aria-expanded="false"
            >
            Wagons Roll
        </a>
        <div class="btn-group dropstart">
            <i class="fa fa-solid fa-user fa-2x" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i>
            <i class="fa fa-caret-down" aria-hidden="true" style="margin:10px 0 0 3px" data-bs-toggle="dropdown" ></i>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <?php if(isset($_SESSION["user"])) : ?>
                    <li><a class="dropdown-item" href="../controller/account_controller.php">Account</a></li>
                <?php endif ?>

                <?php if(isset($_SESSION["user"])) : ?>
                    <li><a class="dropdown-item" href="../controller/logout_controller.php">Logout</a></li>
                <?php endif ?>
                
                <?php if(!isset($_SESSION["user"])) : ?>
                    <li><a class="dropdown-item" href="../controller/login_controller.php">Login/Register</a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>
