<?php 
require_once "conn/db.php"; 

if($_GET['location'])
{
   $l_id=strip_tags($_GET['location']);
    try{

	$sql = "SELECT course from course where c_id in(select c_id from report where l_id=$l_id)" ;
		
	if(!$fetch = mysql_query($sql))
	throw new Exception("Error in query");
	while($result = mysql_fetch_array($fetch))
	{
		$course_name[]=$result['course'];
		
	}
      
    
	echo json_encode($course_name);
	 
	 
	}
	catch(Exception $e)
	{
	 echo $e->getMessage();
	}





}

?>