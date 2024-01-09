$(function(){
	
	
		
		google.charts.load('current', {packages: ['corechart', 'bar']});
		google.charts.load('current', {'packages':['table']});
      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawColColors);
		
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawColColors() {
			
		var data = new google.visualization.DataTable();
        data.addColumn('string', 'stno');
        data.addColumn('number', 'point');
		data.addColumn('number', 'commission');
		
		var jsonData = $.ajax({
              url: baseuri+"chartpointncom/stwisepointnsales",
              dataType: "json",
              async: false
          }).responseText;
		
		var array  = JSON.parse(jsonData);
		$(array).each(function(i,val){ 			
			data.addRow([
				  val.stno, parseInt(val.totalpoint), parseFloat(val.xcom)
				]);
		});
		
		
        // Set chart options
        var options = {
        title: 'Statement wise point and commission',
        colors: ['#9575cd', '#33ac71'],
        hAxis: {
          title: 'Statement'
        },
        vAxis: {
          title: 'Point & Amount'
        }
      };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
		var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: false, width: '100%', height: '100%'});
      }
	
	
});	  ;;