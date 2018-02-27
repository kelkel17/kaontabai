<!doctype html>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
</body>
	<script>
				$('#january').hide();
				$('#february').hide();
				$('#march').hide();
				$('#april').hide();
				$('#may').hide();
				$('#june').hide();
				$('#july').hide();
				$('#august').hide();
				$('#september').hide();
				$('#october').hide();
				$('#november').hide();
				$('#december').hide();
		$('#month').on('change', function(){
				if($(this).val() == 'January'){
		
					$('#january').show();
					$('#february').hide();
					$('#march').hide();
					$('#april').hide();
					$('#may').hide();
					$('#june').hide();
					$('#july').hide();
					$('#august').hide();
					$('#september').hide();
					$('#october').hide();
					$('#november').hide();
					$('#december').hide();			}
		});
	</script>
</html>