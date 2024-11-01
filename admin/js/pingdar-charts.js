google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawTrendlines);

function drawTrendlines() {
	var div = document.getElementById("dom_target");
	var myData = div.textContent;
	//var my_json_str = myData.replace(/&quot;/g, '"');
	let jsonData = JSON.parse(JSON.parse(myData));
	//console.log(jsonData);
  var data = new google.visualization.DataTable();
  data.addColumn('datetime', 'Date');
  data.addColumn('number', 'Ping Time');

  for ( var i = 0; i < jsonData.results[0].series[0].values.length; i++ ) {
    jsonData.results[0].series[0].values[i][0] = new Date( jsonData.results[0].series[0].values[i][0] );
  }

  data.addRows(
    jsonData.results[0].series[0].values
  );

  var options = {
    explorer: {
        actions: ['dragToZoom', 'rightClickToReset'],
        axis: 'horizontal',
        keepInBounds: true,
        maxZoomIn: 26.0
    },
    hAxis: {
        format: 'hh:mm',
    },
    vAxis: {
        title: 'Ping Time'
    },

    colors: ['#0295e5', '#007329'],

    'height': 150
  };

  var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
