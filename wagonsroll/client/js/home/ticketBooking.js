var purchaseDate = "";
var date = "";
$(document).ready( function() {
  var buttons = document.getElementsByClassName('ticketbooking');
  for (let i = 0; i < buttons.length; i++) {
      $(buttons[i]).click( function() {
        date = new Date();
        purchaseDate = (date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate());
        var dayTripId = $(this).attr('id');
        window.location.href = "bookDayTripTicket_controller.php?dayTripId=" + dayTripId +"&purchaseDate=" + purchaseDate;
      })
  }
})
