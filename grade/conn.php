<?php
   $conn=mysqli_connect('localhost','root','','placement');
  if($conn){
  	//echo "connected";
  }
  else{
  	//echo "not connected";
  }
if(!isset($_SERVER['HTTP_REFERER'])){
   header('403.php');
   exit;
}