<script type="text/javascript">
  
  $(document).ready(function(){

    $("input[name='add_to_cart']").on("click", function(){
        var regNum = $(this).attr("id");
        var dailyRate = $("#dailyRate"+regNum+"").val();
        var endDate = $("#endDate"+regNum+"").val();
        var startDate = $("#startDate"+regNum+"").val();
        var brandName = $("#brandName"+regNum+"").val();
        var modelName = $("#modelName"+regNum+"").val();
        var typeName = $("#typeName"+regNum+"").val();
        var maxPassengerNumber = $("#maxPassengerNumber"+regNum+"").val();
        var imageUrl = $("#imageUrl"+regNum+"").val();

        $.ajax({
            method:"POST",
            url: "addToCart_controller.php",
            data:{regNum:regNum,brandName:brandName,modelName:modelName,
            typeName:typeName,maxPassengerNumber:maxPassengerNumber,
            dailyRate:dailyRate, startDate:startDate, endDate:endDate,imageUrl:imageUrl},
            success:function(data){
            	alert("You have successfuly added " + regNum + " to your shopping cart");
            }
         });
    });
  });
</script>