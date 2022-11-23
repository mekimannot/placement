<?php
   /**
    * 
    */
   class csv extends mysqli
   {
   	
   		private $state_csv=false;
   	public function __construct()
   	{
   		parent::__construct("localhost","root","","placement");
   		if($this->connect_error){
   			echo "fail to connect to database: ". $this->connnect_error;
   		}
   	}public function import($file)
   	{
   		$file=fopen($file,'r');
   		while($row=fgetcsv($file)){
          $value="'". implode("','", $row) ."'";
          $q="INSERT INTO student(student_id,fname,mname,lname,gender,region,disability,enterance,stream,year,semester,grade,coc,transcript1,transcript2,c1,c2,c3,c4,c5,c6) VALUES(". $value. ")";
          if($this->query($q)){
          	$this->state_csv=true;

          } else{
          	$this->state_csv=false;
          }
   		}if($this->state_csv){
   			echo "success";
   		}else{
   			echo "something wrong";
   		}
   	}
   }
?>