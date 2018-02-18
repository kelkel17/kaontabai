        $( function() {
          $( "#datepicker" ).datepicker({
              minDate: -0,
              maxDate: "+14D",
              changeMonth: true,
              changeYear: true, 
              numberOfMonths: 1,
              dateFormat: 'MM dd, yy' }); 

          $("#timepicker").timepicker({
          		timeFormat: 'g:i A',
          		minTime: '8:00',
          		maxTime: '24:00'
          });
          });
    
      $( function() {
          $( "#datepicker2" ).datepicker({
              minDate: -0,
              maxDate: "+14D",
              changeMonth: true,
              changeYear: true, 
              numberOfMonths: 1,
              dateFormat: 'MM dd, yy' }); 

          $("#timepicker2").timepicker({
              timeFormat: 'g:i A',
              minTime: '8:00',
              maxTime: '24:00'
          });
          });
 $(document).ready(function(){
 	if(!$("mp3").is(":visible")){
 			$("#show").hide();
		   	 $("#hide").click(function(){
		        $("#mp3").slideUp();
				$("#show").show();
		        $("#hide").hide();
		    });
		   	  $("#show").click(function(){
		        $("#mp3").slideDown();
		        $("#show").hide();
		        $("#hide").show();
		    });
	}	    
    
});