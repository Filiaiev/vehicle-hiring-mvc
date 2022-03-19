$(document).ready(function() { 
    $(".carousel-inner").load("newVehicles_controller.php");  
    setInterval(function() {
        $(".carousel-inner").load("newVehicles_controller.php");
    }, 60000)
});