
  
  $(document).ready(function(){

    $("input[name='add_to_cart']").on("click", function(){
        var regNum = $(this).attr("id");
        var endDate = $("#endDate"+regNum+"").val();
        var startDate = $("#startDate"+regNum+"").val();
        // if the dates are not empty
        if (!(!endDate || !startDate)){
          var dailyRate = $("#dailyRate"+regNum+"").val();
          var brandName = $("#brandName"+regNum+"").val();
          var modelName = $("#modelName"+regNum+"").val();
          var typeName = $("#typeName"+regNum+"").val();
          var maxPassengerNumber = $("#maxPassengerNumber"+regNum+"").val();
          var imageUrl = $("#imageUrl"+regNum+"").val();
          regNum = regNum.replace("_", " ");

          $.ajax({
              method:"POST",
              url: "addToCart_controller.php",
              data:{regNum:regNum,brandName:brandName,modelName:modelName,
              typeName:typeName,maxPassengerNumber:maxPassengerNumber,
              dailyRate:dailyRate, startDate:startDate, endDate:endDate,imageUrl:imageUrl},
              success:function(msg){
                alert(msg);
              }
          });
      }else{alert ("In order to make a booking you have to input full dates. \n Please try again.")};
    });
  });
