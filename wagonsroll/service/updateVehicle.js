$(document).ready( function() {
    var buttons = document.getElementsByClassName('update');
    for (let i = 0; i < buttons.length; i++) {
        $(buttons[i]).click( function() {
            var regNum = $(this).attr('id');
            console.log(regNum);
            window.location.href = "updateVehicle_controller.php?regNum=" + regNum;
        })
    }
})