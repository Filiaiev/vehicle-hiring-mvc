<?php 
    if(!isset($_SESSION)) {
        session_start();
    }

    if (isset($_POST['action'])) {
  	    if ($_POST['action'] == "clear") {
  	  	    unset($_SESSION['cart']);
    }


    if ($_POST['action'] == "remove") {
  	  	  
  	  	foreach ($_SESSION['cart'] as $key => $value) {
  	  	  	if ($value['regNum'] == $_POST['id']) {
  	  	  	  	unset($_SESSION['cart'][$key]);
  	  	  	}
  	  	}
  	}
  }

 ?>