	$(document).ready(function(){
		$("button.remove").click(function(){
           var id = $(this).attr("id");
        	var action = "remove";

             $.ajax({
               method:"POST",
               url:"../controller/basketAction_controller.php",
               data:{action:action,id:id},
               success:function(data){
                  alert("You have successfully removed vehicle "+id+" from your basket.");
               }
            });
		});
        

        $(".clearall").click(function(){
            var action = "clear";

            $.ajax({
               method:"POST",
               url:"../controller/basketAction_controller.php",
               data:{action:action},
               success:function(data){
                  alert("You have successfully emptied your basket.");
               }
            });
        });
	});
