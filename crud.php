<?php

class Crud
{

private $mysqli;


public function __construct()
{  
   try{
    $this->mysqli= new mysqli("localhost", "root", "root", "db_report");
    }
	catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
	
	
	}

public function base_url(){
  $protocol = "http";
  return $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

public function get_id()
{
 return $this->mysqli->insert_id;
} 
	
	
public function Operation($query=null,$url=null)
{
 try{
 if($query!=null){
 $this->mysqli->query($query);
 if($this->mysqli->affected_rows)
 header($url);
  }
 }
 catch(Exception $e)
 {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
 }
 
}





}

