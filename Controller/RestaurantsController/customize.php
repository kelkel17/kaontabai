<script src="../../something/js/jquery.min.js"></script>
<script src="../../something/js/sweetalert.min.js"></script>
<script>
	function updateAlert(rid,id,cid){
		$(function(){
			swal({
				title:"Successfully",
				text:"Customized your Combo meal",
				icon: "success"
			}).then(function(){
					window.location = "../../Model/Customer/addtocart.php?cid="+cid+"&pid="+id+"&rid="+rid;
			});
		});
	}
</script>

<?php 

include '../dbconn.php';


if(isset($_POST['customize'])){
		$cim = $_POST['cim'];
		$rid = $_POST['rid'];
		$id = $_POST['id'];
		$cid = $_POST['cid'];
		// $id = $_SESSION["id"];
		$menu = $_POST['menu'];

		$men = implode(",",$menu);	

		$data = array($men,$cim);		
		customizeCombo($data);
		echo "<script>updateAlert('$rid','$id','$cid');</script>";
	}	