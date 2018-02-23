                                <!-- <table id="dataTable" class="">     -->
                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="viewOrder<?php echo $rows['order_id']; ?>" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                              <center><h3 class="modal-title"><?php echo $row['customer_fname'];?>'s Receipt</h3></center>
                                                 <table id="dataTable" class="table table-striped table-bordered nowrap" width="100%" cellspacing="0">
                                                  <thead>
                                                        <tr>
                                                            <th>Order ID:</th>  
                                                            
                                                            <th>Reservation ID:</th>  
                                                            
                                                            <th>Payment ID:</th> 
                                                            
                                                            <th>Order Date & Time:</th>
                                                            
                                                            <th>Total Payment:</th> 
                                                            
                                                            <th>Payment Status:</th> 
                                                            
                                                            <th>Order Status:</th>
                                                            
                                                            <th>List of Product Order:</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $rows['num'];?></td>
                                                            <td><?php echo $rows['reservation_id'];?></td>
                                                            <td><?php echo $rows['payment_id'];?></td>
                                                            <td><?php echo date('F d, Y g:i A', strtotime($rows['tim']));?></td>
                                                            <td>&#8369;<?php echo number_format($rows['pr'],2);?></td>
                                                            <td><?php if($rows['order_status']==1){ echo "Paid"; } else{ echo "Not Paid"; }?></td>
                                                            <td><?php echo $rows['stat'];?></td>
                                                <?php 
                                                  $con = con();
                                                  $sql = "SELECT * FROM  order_details as od, menus as m WHERE od.menu_id = m.menu_id";
                                                  $stmt = $con->prepare($sql);
                                            $stmt->execute();
                                            $view = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                             
                                             if(count($view)>0){
                                              foreach($view as $r){

                                            if($rows['order_id'] == $r['order_id']){
                                                ?>
                                                    
                                                            <td><?php echo $r['m_name'].' '.$r['order_qty'];?> pcs<br/></td>
                                                        </tr>
                                                    </tbody>
                                               <?php } } }?>    
                                            </table>
                                           </div> 
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-primary hover" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                        </div>
                                    </div><!-- end of receipt modal -->