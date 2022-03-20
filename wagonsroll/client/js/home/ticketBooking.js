var purchaseDate = "";
var date = "";
$(document).ready( function() {
  var buttons = document.getElementsByClassName('ticketbooking');
  for (let i = 0; i < buttons.length; i++) {
      $(buttons[i]).click( function() {
        date = new Date();
        purchaseDate = (date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate());
        // purchaseDate = ('0' + date.getDate()).slice(-2) + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + date.getFullYear();
        console.log(date);
        var dayTripId = $(this).attr('id');
        console.log(dayTripId);
        window.location.href = "bookDayTripTicket_controller.php?dayTripId=" + dayTripId +"&purchaseDate=" + purchaseDate;
      })
  }
})
//'0' + date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + date.getDate()).slice(-2)