<?php require_once "conn/db.php"; 

//set your time zone 

?>
<html>
<head>
<link rel="stylesheet" href="js/jquery-ui.css" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script><script type="text/javascript" src="js/jquery-ui.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>

$(function(){
var chart;

$('#location').change(function() {
 $location=$(this).val();
 
$.ajax({
  url: 'ajax.php',
  type:'GET',
  data:"location="+$location,
  success: function(data) {
  $catagories= eval ("(" + data + ")"); 

$.ajax({
  url: 'ajax_data.php',
  type:'GET',
  data:"location="+$location,
  success: function(data) {
  $categories = $catagories;
  $data= eval ("(" + data + ")"); 	
  
    var colors = Highcharts.getOptions().colors,
            categories = $categories ,
            name = 'Course',
            data =$data;
			
       function setChart(name, categories, data, color) {
            chart.xAxis[0].setCategories(categories, false);
            chart.series[0].remove(false);
            chart.addSeries({
                name: name,
                data: data,
                color: color || 'white'
            }, false);
            chart.redraw();
        }
		chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Different Courses'
            },
            subtitle: {
                text: 'Click the columns to view Stats'
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Total percent of course '
                }
            },
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var drilldown = this.drilldown;
                                if (drilldown) { // drill down
                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                } else { // restore
                                    setChart(name, categories, data);
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[0],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y +'%';
                        }
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    var point = this.point,
                        s = this.x +':<b>'+ this.y +'% market share</b><br/>';
                    if (point.drilldown) {
                        s += 'Click to view '+ point.category +' versions';
                    } else {
                        s += 'Click to return to browser brands';
                    }
                    return s;
                }
            },
            series: [{
                name: name,
                data: data,
                color: 'white'
            }],
            exporting: {
                enabled: false
            }
        });
  	
//all code should be here in ajax success 	
  }
});

}
});

 
 });
});

</script>

</head>

<body>
<fieldset id="e1">
  <legend>Charts</legend>
 
  <select id="location" name="location"  style="width:120px">
  <option>Select a Location</option>
  <?php
    try{

	$sql = "SELECT * FROM location order by Location asc";
	$fetch = mysql_query($sql);
	while($result = mysql_fetch_array($fetch))
	{
		echo "<option value=\"".$result['l_id']."\">".$result['Location']."</option>";
	}
	}
	catch(Exception $e)
	{
	 echo $e->getMessage();
	}
       
    
	?>
  </select>
  
  </fieldset>
  
 
<div id="container" style="min-width: 800px; height: 400px; margin: 0 auto"></div>

  
</body>
</html>


