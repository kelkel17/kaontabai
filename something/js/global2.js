
			function load_unseen_notification(view = '')
			{
				$.ajax({
					url: "../Controller/RestaurantsController/fetch2.php",
					method: "POST",
					data:{view:view},
					dataType:"json",
					success:function(data)
					{
						$('.dropdown-alerts').html(data.notification);
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
				//$('count').html('');
				load_unseen_notification('yes');
				$('.count').html('');

			});
			setInterval(function(){
				load_unseen_notification();;

			},5000);
	
