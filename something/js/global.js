
			function load_unseen_notification(view = '')
			{
				$.ajax({
					url: "../../Controller/RestaurantsController/fetch.php",
					method: "POST",
					data:{view:view},
					dataType:"json",
					success:function(data)
					{
						$('.dropdown-messages').html(data.notification);
						if(data.unseen_notification > 0)
						{
							$('.count').html(data.unseen_notification);
							//setTimeout(function() {}, 1000);
						}

					}
				});
			}
       
			load_unseen_notification();
			 $('#message_form').on('submit',function(event){
				event.preventDefault();
				if($('#message').val() != '')
				{
					var form_data = $(this).serialize();
					$.ajax({
						url:"../Controller/CustomersController/message.php",
						method:"POST",
						data:form_data,
						success:function(data)
						{
							$('#message_form')[0].reset();
							load_unseen_notification();
						}
					});
				}
				else
				{
					alert("Both Fields are Required");
				}	
			});
			$(document).on('click','.dropdown-toggle', function(){
				//alert('asdsads');
				$('count').html('');
				load_unseen_notification('yes');
				$('.count').html('');

			});
			setInterval(function(){
				load_unseen_notification();;

			},5000);
	
			function loadImage(event,el){
                console.log(el);
                console.log(event.target.files[0]);
        var loadImg = document.getElementById(el);
        loadImg.src = URL.createObjectURL(event.target.files[0]);
    }

 

function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else if(tr[i].id != 'tableHeader' && tr[i].id != 'tableFooter') {
            tr[i].style.display = "none";
        }
    }
    

    table = document.getElementById("myTable2");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else if(tr[i].id != 'tableHeader2' && tr[i].id != 'tableFooter2') {
            tr[i].style.display = "none";
        }
    }
}

$(function(){
      $('#1').hide();
      $('#2').hide();
      $('#3').hide();
  $('#category').change(function(){
    var data = $(this).val();
    if(data == 1){
      $('#testme').val('Appetizer');
      $('#type').on('change', function(){
        console.log($(this).val());
        $('#testme').val($(this).val());
      });
      $('#1').show();
      $('#2').hide();
      $('#3').hide();
      $('#type').attr("required". true);
    } else if(data == 2){
            $('#testme').val('Beer');
      $('#type2').on('change', function(){
        console.log($(this).val());
        $('#testme').val($(this).val());
      });
      $('#1').hide();
      $('#2').show();
      $('#3').hide();
      $('#type2').attr("required". true);
    } else if(data == 3){
            $('#testme').val('Ice Cream');
     $('#type3').on('change', function(){
        console.log($(this).val());
        $('#testme').val($(this).val());
      });
      $('#1 ').hide();
      $('#2').hide();
      $('#3').show();
      $('#type3').attr("required". true);
    } else {
            $('#testme').val('');
      $('#1').hide();
      $('#2').hide();
      $('#3').hide();
    }

  }).change();
});
 $(function(){
      $('#11').hide();
      $('#12').hide();
      $('#13').hide();
  $('#category2').change(function(){
    var data = $(this).val();
    if(data == 1){
      $('#testme2').val('Appetizer');
      $('#type4').on('change', function(){
        console.log($(this).val());
        $('#testme2').val($(this).val());
      });
      $('#11').show();
      $('#12').hide();
      $('#13').hide();
      $('#type4').attr("required". true);
    } else if(data == 2){
            $('#testme2').val('Beer');
      $('#type22').on('change', function(){
        console.log($(this).val());
        $('#testme2').val($(this).val());
      });
      $('#11').hide();
      $('#12').show();
      $('#13').hide();
      $('#type22').attr("required". true);
    } else if(data == 3){
            $('#testme2').val('Ice Cream');
     $('#type32').on('change', function(){
        console.log($(this).val());
        $('#testme2').val($(this).val());
      });
      $('#11').hide();
      $('#12').hide();
      $('#13').show();
      $('#type32').attr("required". true);
    } else {
            $('#testme2').val('');
      $('#11').hide();
      $('#12').hide();
      $('#13').hide();
    }

  }).change();
});