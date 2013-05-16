<?php
//sanitizing data
include_once 'crud.php';

if(array_key_exists('type',$_GET)){

$table=strip_tags($_GET['type']);

switch($table)
{
case "report":

$id=htmlentities(strip_tags($_GET['id']));


$query="delete from report where id=$id";
$query_child="delete from modules where c_id in(select c_id from report where id=$id) ";


$url='http://localhost/highcharts_report/';
$crud =new Crud();
$crud->Operation($query_child);
$crud->Operation($query);

header($url);


break;




}

}