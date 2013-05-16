<?php
//sanitizing data
include_once 'crud.php';
if(array_key_exists('operate',$_POST)){

$table=strip_tags($_POST['operate']);

if(array_key_exists('update',$_POST))
{

switch($table)
{
case "report":

 $course=htmlentities(strip_tags($_POST['course']));
 $location=htmlentities(strip_tags($_POST['location']));
 $date_created=htmlentities(strip_tags($_POST['date_created']));
 $id=htmlentities(strip_tags($_POST['update']));

 $query= "update report SET l_id="."'$location'".","."c_id="."'$course'".","."date_created="."'$date_created'".
   "where id=".$id;
 $crud =new Crud();
 $url='Location:http://localhost/highcharts_report/';
 $crud->Operation($query,$url);


break;


}

}
else
{
switch($table)
{
case "report":

 $location=htmlentities(strip_tags($_POST['location']));
 $course=htmlentities(strip_tags($_POST['course']));
 $date_created=htmlentities(strip_tags($_POST['date_created']));
 $query= "insert into report(l_id,c_id,date_created) values("."'$location'".",". "'$course'".","."'$date_created'".")";
 $crud =new Crud();

 $url='Location:http://localhost/highcharts_report/';
$crud->Operation($query);
 $i=0;
 foreach($_POST['module_name'] as $name)
 {
 
 $data[$name]=$_POST['module'][$i];
 $i++;
 }

 foreach($data as $key=>$value) 
 {
 $query="insert into modules(m_name,value,c_id)values("."'$key'".",". "'$value'".","."'$course'".")";
 $crud->Operation($query,$url);
 
 }
 //$query= "insert into (location,device_id,date_created) values("."'$location'".",". "$course".","."$date_created".")";

break;


}
}

}