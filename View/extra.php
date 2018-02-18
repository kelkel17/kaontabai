<ul class="dropdown-menu dropdown-messages">
						<?php foreach ($rows as $row) {?>
					 			<li><a href="#"><?php echo $row['customer_fname'].' '.$row['customer_lname'];?></a></li>
										
								
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<!-- <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff"> -->
									
									
									<div class="message-body">
										<li><?php echo $row['message'];?></li>
										<small class="pull-right"></a>
											<li><?php echo date('h:m A', strtotime($row['date_time_receive'])); ?></li>
											
										</small>

									<br /></div>
								</div>
								<?php }	}?>