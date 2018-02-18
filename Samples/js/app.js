$(document).ready(function(){
	$.ajax({
		url: "../Samples/dailysales.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var test = [];
			var cs = [];
			//var dout = Date.parse(test);
			for(var i in data) {
				//console.log(new Date(data[i].tim).toDateString());
				test.push("Sales as of " + new Date(data[i].tim).toDateString());
				cs.push(data[i].total);
			}
			
			//var ctx = document.getElementById('#myChart').getContext('2d');

			var myChart = {

			        labels: test,
			        datasets: [{
			            label: 'Daily Sales',
			            fill: false,
			            data: cs,
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255,99,132,1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    };
			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: myChart,
				options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		          }
		    	}
			});

	
		},
		error: function(data) {
			console.log(data);
		}
	});
});
$(document).ready(function(){
	$.ajax({
		url: "../Samples/dailysoldproduct.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var test = [];
			var cs = [];
			//var dout = Date.parse(test);
			for(var i in data) {
				// console.log(new Date(data[i].tim).toDateString());
				test.push("As of "+new Date(data[i].tim).toDateString());
				cs.push(data[i].total);
			}
			
			//var ctx = document.getElementById('#myChart').getContext('2d');

			var myChart = {

			        labels: test,
			        datasets: [{
			            label: 'Daily Total Product Sold',
			           //fill: false,
			            data: cs,
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255,99,132,1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    };
			var ctx = $("#mycanvas2");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: myChart,
				
			});

	
		},
		error: function(data) {
			console.log(data);
		}
	});
});
$(document).ready(function(){
	$.ajax({
		url: "../Samples/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var customer = [];
			var point = [];

			for(var i in data) {
				customer.push(data[i].id);
				point.push(data[i].total);
			}
			
			//var ctx = document.getElementById('#myChart').getContext('2d');

			var myChart = {

			        labels: customer,
			        datasets: [{
			            label: 'Total Sold Per Product',
			            data: point,
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)',
			              	'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			                  
			            ],
			            borderColor: [
			                'rgba(255,99,132,1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)',
			                'rgba(255,99,132,1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    };
			var ctx = $("#mycanvas3");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: myChart,
				options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		          }
		    	}
			});

	
		},
		error: function(data) {
			console.log(data);
		}
	});
});
$(document).ready(function(){
	$.ajax({
		url: "../Samples/monthlytotalsales.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var customer = [];
			var point = [];

			for(var i in data) {
				customer.push("As of " + data[i].id);
				point.push(data[i].total);
			}
			
			//var ctx = document.getElementById('#myChart').getContext('2d');

			var myChart = {

			        labels: customer,
			        datasets: [{
			            label: 'Monthly Sales',
			            data: point,
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255,99,132,1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    };
			var ctx = $("#mycanvas4");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: myChart,
				options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		          }
		    	}
			});

	
		},
		error: function(data) {
			console.log(data);
		}
	});
});
		$(document).ready(function(){
		$.ajax({
			url: "../Samples/monthlytotalorder.php",
			method: "GET",
			success: function(data) {
				console.log(data);
				var customer = [];
				var point = [];

				for(var i in data) {
					customer.push("As of " + data[i].tim);
					point.push(data[i].total);
				}
				
				//var ctx = document.getElementById('#myChart').getContext('2d');

				var myChart = {

				        labels: customer,
				        datasets: [{
				            label: 'Monthly Total Number of Order',
				            data: point,
				            backgroundColor: [
				                'rgba(255, 99, 132, 0.2)',
				                'rgba(54, 162, 235, 0.2)',
				                'rgba(255, 206, 86, 0.2)',
				                'rgba(75, 192, 192, 0.2)',
				                'rgba(153, 102, 255, 0.2)',
				                'rgba(255, 159, 64, 0.2)'
				            ],
				            borderColor: [
				                'rgba(255,99,132,1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 206, 86, 1)',
				                'rgba(75, 192, 192, 1)',
				                'rgba(153, 102, 255, 1)',
				                'rgba(255, 159, 64, 1)'
				            ],
				            borderWidth: 1
				        }]
				    };
				var ctx = $("#mycanvas5");

				var barGraph = new Chart(ctx, {
				type: 'bar',
				data: myChart,
				options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		          }
		    	}
			});

		
			},
			error: function(data) {
				console.log(data);
			}
		});
	});

			$(document).ready(function(){
		$.ajax({
			url: "../Samples/dailytotalorder.php",
			method: "GET",
			success: function(data) {
				console.log(data);
				var customer = [];
				var point = [];

				for(var i in data) {
					customer.push("As of " + data[i].tim);
					point.push(data[i].total);
				}
				
				//var ctx = document.getElementById('#myChart').getContext('2d');

				var myChart = {

				        labels: customer,
				        datasets: [{
				            label: 'Daily Total Number of Order',
				            data: point,
				            backgroundColor: [
				                'rgba(255, 99, 132, 0.2)',
				                'rgba(54, 162, 235, 0.2)',
				                'rgba(255, 206, 86, 0.2)',
				                'rgba(75, 192, 192, 0.2)',
				                'rgba(153, 102, 255, 0.2)',
				                'rgba(255, 159, 64, 0.2)'
				            ],
				            borderColor: [
				                'rgba(255,99,132,1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 206, 86, 1)',
				                'rgba(75, 192, 192, 1)',
				                'rgba(153, 102, 255, 1)',
				                'rgba(255, 159, 64, 1)'
				            ],
				            borderWidth: 1
				        }]
				    };
				var ctx = $("#mycanvas6");

				var barGraph = new Chart(ctx, {
				type: 'bar',
				data: myChart,
				options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		          }
		    	}
			});

		
			},
			error: function(data) {
				console.log(data);
			}
		});
	});

	$(document).ready(function(){
	$.ajax({
		url: "../Samples/monthlysoldproduct.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var test = [];
			var cs = [];
			//var dout = Date.parse(test);
			for(var i in data) {
				// console.log(new Date(data[i].tim).toDateString());
				test.push("As of "+new Date(data[i].tim).toDateString());
				cs.push(data[i].total);
			}
			
			//var ctx = document.getElementById('#myChart').getContext('2d');

			var myChart = {

			        labels: test,
			        datasets: [{
			            label: 'Monthly Total Product Sold',
			           //fill: false,
			            data: cs,
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255,99,132,1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    };
			var ctx = $("#mycanvas7");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: myChart,
				
			});

	
		},
		error: function(data) {
			console.log(data);
		}
	});
});