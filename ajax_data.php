<?php 
require_once "conn/db.php"; 

//set your time zone 

if($_GET['location'])
{
    $l_id=strip_tags($_GET['location']);
    try{
       $sql="Select c_id,course from course where c_id in(select c_id from report where l_id=$l_id)";
       if(!$fetch = mysql_query($sql))
		throw new Exception("Error in query1");
		while($result = mysql_fetch_array($fetch))
		{
		$course[$result['c_id']]=$result['course'];
		}
	
	$sql = "SELECT m_name, AVG( value ) as value,c_id 
FROM modules
where c_id in(select c_id from report where l_id=$l_id)
group by m_name order by c_id" ;
		
	if(!$fetch = mysql_query($sql))
	throw new Exception("Error in query2");
	while($result = mysql_fetch_array($fetch))
	{
	
		$data[$result['c_id']][$result['m_name']]=$result['value'];
		
	}

	$k=0;
foreach($data as $item)
	{
	
    
	$sum[$k]=0;	
	$count=count($item);
	$i=0;
	foreach ($item as $key =>$value)
	 {
	
	 
	 $cat[$k][$i]=$key;
	 $p_data[$k][$i]=(int)$value;
	 $sum[$k]+=$value;
	
	$i++;
	}
	$k++;
   }

	$i=0;
	$color[0]="red";
	$color[1]="blue";
	$color[2]="violet";
	$color[3]="green";
	$color[4]="yellow";
	$color[5]="pink";
	$color[6]="brown";
	
	
	foreach($course as $item)
	{
	
	$output[$i]['y']=(float)sprintf("%01.2f", $sum[$i]);
	$output[$i]['color']="$color[$i]";
	$output[$i]['drilldown']= array(
	'name'=>$item,
	'categories'=>$cat[$i],
	'data'=>$p_data[$i],	
	'color'=>"$color[$i]"
	);
	
	$i++;
	}
	echo json_encode($output);
	}
	catch(Exception $e)
	{
	 echo $e->getMessage();
	}

 }
 