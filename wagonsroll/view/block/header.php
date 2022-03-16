<nav class="navbar navbar-light bg-light" style="padding-left: 20px; padding-right:20px">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://www.kindpng.com/picc/m/140-1404603_sports-car-logo-car-logo-png-vector-transparent.png" alt="car logo" width="65" height="27" class="d-inline-block align-text-top" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Wagons Roll
        </a>
        <div style="display:flex">
            <div class="btn-group dropstart">
                <i class="fa fa-solid fa-user fa-2x" style="margin-right:30px" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <!-- TODO display: none when user is unlogged -->
                    <li>
                        <form action="../controller/account_controller.php" method="POST">
                            <input class="dropdown-item" type="submit" value="Account"/>
                        </form>
                    </li>
                    <!-- TODO display: none when user is unlogged -->
                    <li>
                        <form action="../controller/logout_controller.php" method="POST">
                            <input class="dropdown-item" type="submit" value="Logout"/>
                        </form>
                    </li>
                    <!-- TODO if user see dropdown when if he is unlogged and maybe blocked on login/registration pages -->
                    <!-- <li><a class="dropdown-item" href="#">Login/Register</a></li> -->
                </ul>
            </div>
            <i class="fa fa-cog fa-fw fa-2x"></i>
        </div>
    </div>
</nav>
