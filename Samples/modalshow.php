
<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery.min.js"></script>
 
 <link rel="stylesheet" href="css/bootstrap.css" />
 
 <script src="js/bootstrap.js"></script>
</head>
<body>
<?php 
	include '../Controller/dbconn.php';
	$con = con();
	$id = $_GET['id'];
	$sql = "SELECT * FROM orders o, customers c WHERE o.customer_id = c.customer_id AND o.customer_id = '$id'";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($view as $row) {
		echo $row['status'];
?>

	<div class="modal" id="modalShow" data-default="Queueing" data-value="<?php echo $row['status']; ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
					<h3 class="modal-title">Sample</h3>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		var value = $('#modalShow').data('value');
		var text = $('#modalShow').data('default');
		console.log(text);
 		if(value != text){
		$('#modalShow').show();
		}
	});
</script>
</html>