<?php require_once "conn/db.php"; 
 if(!array_key_exists('id',$_GET))  header('Location:http://localhost/highchart_report/');
?>


<html>
<head>
<link rel="stylesheet" href="js/jquery-ui.css" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<title> Admin Operation Demo! </title>

<script>
$('document').ready(function(){
  $( "#datepicker" ).datepicker();
  });

</script>

</head>
<body>


<form method="post" action="insert.php" >
<input type="hidden" id="operate" name="operate" value="report"/>
<input type="hidden" id="update" name="update" value="<?php echo $_GET['id'];?>"/>

 <fieldset id="e1">
  <legend>Report updated on id <?php echo $_GET['id'];?></legend>
  <table class="imagetable" border="1">

       <tr><th>Location</th><td>
  <select name="location"  style="width:120px">
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
  </td></tr>

   <tr><th>Course</th><td>
  <select name="course"  style="width:120px">
  <option>Select a course</option>
  <?php
    try{

	$sql = "SELECT * FROM course order by course asc";
	$fetch = mysql_query($sql);
	while($result = mysql_fetch_array($fetch))
	{
		echo "<option value=\"".$result['c_id']."\">".$result['course']."</option>";
	}
	}
	catch(Exception $e)
	{
	 echo $e->getMessage();
	}


	?>
  </select>
  </td></tr>
  
  <tr><th>DatePicker</th><td><input type="text" name="date_created" id="datepicker" /></td></tr>

  <tr><td colspan="2" align="center"> <input name="submit" type="submit" id="submit" value="Update Report" />
  </td></tr>  
  </table>
  </fieldset>
 
</form>

</body>
</html> 