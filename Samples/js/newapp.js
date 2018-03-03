$(document).ready(function(){
	$.ajax({
		url: "../Samples/getsomething.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var test = [];
            var cs = [];
            var sd = [];
			//var dout = Date.parse(test);
			for(var i in data) {
				//console.log(new Date(data[i].tim).toDateString());
				test.push("Sales as of " + new Date(data[i].tim).toDateString());
                cs.push(data[i].total);
                sd.push(data[i].name);
			}
			
			//var ctx = document.getElementById('#myChart').getContext('2d');
			// for(var x = 0; x < data.length; x++)
			var myChart = {

			        labels: test,
			        datasets: [{
			            label: sd,
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