<?php
    require_once "../model/role.php";
    require_once "../model/user.php";
    
    if(!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION["user"]) || (isset($_SESSION["user"]) && $_SESSION["user"]->roleId == Role::CUSTOMER)) {
        $total_price = 0;
        if (!empty($_SESSION['cart'])){ 
            foreach ($_SESSION['cart'] as $key => $value){
                $total_price = $total_price + $value['price'];
            }
        }
        require_once "../view/cart_view.php";
    }

?>