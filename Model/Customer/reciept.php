

	<td><center>
	
	 	<tr>
		    <?php 
        $sql = "SELECT * FROM customers";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$result = mysqli_query($conn,$sql); 
  
        foreach($rows as $row)
       // while($row = mysqli_fetch_assoc($result))
        {
		   echo '<td><center>'.$row['customer_id'].'</center></td>';
		   echo '<td><center>'.$row['customer_fname'].' '.$row['customer_mname'].' '.$row['customer_lname'].'</center></td>';
		   echo '<td><center>'.$row['customer_email'].'</center></td>';
		   echo '<td><center>'.$row['customer_status'].'</center></td>';
	  
	    ?>
	        
	</center></td>
	

	<script type="text/javascript">
    $(document).ready(function() {
    $('#dataTable2').DataTable( {
      dom: 'Bfrtip',
      buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5',
        'print'
      ]
    } );
  });
 </script>