<?php require_once "conn/db.php"; ?>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<title> Admin Operation </title>
<style type="text/css">
#add_record a{
display:block;
position:relative;
top:50px;
left:50px;
text-decoration:none;
}
#view_chart a{
display:block;
position:relative;
top:30px;
left:150px;
text-decoration:none;
}


</style>
</head>
<body>
<div id="add_record">
<a href="http://localhost/highcharts_report/insert_record.php">Add a Record</a>
</div>
<div id="view_chart">
<a href="http://localhost/highcharts_report/show_chart.php">View Chart</a>
</div>
<fieldset id="e1">
  <legend>Report </legend>

<table border="1" class="imagetable" >

<?php
try{

  $count_sql="SELECT COUNT(*) as count FROM report";
  $f = mysql_query($count_sql);
   while($result = mysql_fetch_array($f))
	{
	 $count =$result['count'];
    }

	if($count!=0){
  echo "<tr><th>Location</th><th>Course</th><th>Date Created</th>
<th colspan='2'>Actions</th></tr>";

	$sql = "SELECT report.id as id,location.Location as location ,course.course as course ,report.date_created as date_created from location,course,report where report.l_id=location.l_id and report.c_id=course.c_id";
	$fetch = mysql_query($sql);
	
	while($result = mysql_fetch_array($fetch))
	{   
		
		 $url="'update_report.php?id=".$result["id"]."'";
		 $url2="'delete.php?type=report&id=".$result['id']."'";
		 
        echo "<tr><td>".$result['location']
		."</td><td>".$result['course']."</td><td>".$result['date_created']."</td><td><a href=".$url.">update</a>"."</td><td><a href=".$url2.">delete</a>";
       		 
		}
		}
		
		else
		{
		echo "<p>No Record Found. </p>";
		}
		
		}catch(Exception $e)
	{
	 echo $e->getMessage();
	}
	
		
?>
</table>
</fieldset>
</body>
</html> 