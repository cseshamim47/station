$(function(){
	
		google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
		
		var data = new google.visualization.DataTable();
        data.addColumn('string', 'itemcode');
        data.addColumn('number', 'qty');
		
		var jsonData = $.ajax({
              url: baseuri+"chartsales/toptenitems",
              dataType: "json",
              async: false
          }).responseText;
		
		var array  = JSON.parse(jsonData);
		$(array).each(function(i,val){ 			
			data.addRow([
				  val.xitemcode, parseInt(val.xqty)
				]);
		});
		
		
        // Set chart options
        var options = {'title':'Top 20 Selling Items',
                       'width':600,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);

      }
});	  ;;