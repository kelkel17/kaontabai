<div class="modal fade" tabindex="-1" role="dialog" id="viewOrder<?php echo $rows['order_id']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div id="<?php echo $rows['order_id'];?>">
                <center>
                    <h3 class="modal-title"><?php echo $row['customer_fname'];?>'s Receipt</h3></center>

                <div class="modal-body" style="padding-left: 30px;"><strong>
                                                    Restaurant Name: <?php echo $rows['name']; ?><br/>
                                                    Order ID: <?php echo $rows['num'];?> <br>
                                                    Reservation ID: <?php echo $rows['reservation_id'];?> <br>
                                                    Payment ID: <?php echo $rows['payment_id'];?><br>
                                                    Order Date & Time: <?php echo date('F d, Y g:i A', strtotime($rows['tim']));?><br>
                                                    Total Payment: &#8369;<?php echo number_format($rows['pr'],2);?><br>
                                                    Payment Status: <?php if($rows['order_status']==1){ echo "Paid"; } else{ echo "Not Paid"; }?><br>
                                                    Order Status: <?php echo $rows['stat'];?><br>
                                                    List of Product Order:<br>
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
                                                    <ul style="list-style-type: circle;">
                                                        <li style="margin-left:5%"><?php echo $r['m_name'].' '.$r['order_qty'];?> pcs</li>
                                                    </ul>    
                                               <?php } } }?>    

                                          </strong></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary hover" data-dismiss="modal">Close</button>
                <input type="button" onclick="printDiv(<?php echo $rows['order_id'];?>)" class="btn btn-primary" value="Print Receipt" />
                </body>
            </div>

        </div>
    </div>
</div>
<!-- end of receipt modal -->