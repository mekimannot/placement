<?php
   include('../conn.php');
   include('../session.php');
   $select=mysqli_query($conn,"select *from student where ID='$session_id'");
   $row=mysqli_fetch_assoc($select);
   $dep=$row['department'];
   $stream=$row['stream'];
  $semester=$row['semester'];
  $st_id=$row['student_id'];
   //if($dep==""){
                $select1=mysqli_query($conn,"select *from department where stream='$stream' and semester='$semester'");
                $counts=mysqli_num_rows($select1);
  if(isset($_POST['submit'])){
    for($i=1;$i<=$counts;$i++){
    $ch="ch$i";
    $array[$i]=$_POST[$ch];
    }$n1=1;
    for($i=1;$i<=$counts;$i++){
        for($j=$i+1;$j<=$counts;$j++){
          if($array[$i]==$array[$j]){
            $n1=2;
          }
        }
    }
    if($n1==2){
        echo "<script>alert('you are choice two or more simalare department');</script>";
       echo "<script type='text/javascript'>document.location='index.php';</script>";
     }else{
     for($i=1;$i<=$counts;$i++){
        $c="c$i";
        $choice=0;
    $select_choice=mysqli_query($conn,"select *from student_choice");
    $num_choice=mysqli_num_rows($select_choice);
    if($num_choice>0){
        while($fetch_choice=mysqli_fetch_assoc($select_choice)){
            $student_id=$fetch_choice['student_id'];
            if($student_id==$st_id){
                $choice=1;
            }
        }
      }if($choice==0){
        $insert_choice=mysqli_query($conn,"insert into student_choice(student_id,$c) values('$st_id','$array[$i]')");
      }else{
        $update_choice=mysqli_query($conn,"update student_choice set $c='$array[$i]' where student_id='$st_id'");
      }  
        
    
    $update=mysqli_query($conn,"update student set $c='$array[$i]'  where ID='$session_id'");
}
    if($update){
        echo "<script type='text/javascript'>alert('seccussfuly updated');</script>";
        echo "<script type='text/javascript'>document.location='select_dep.php';</script>";
        
    }else{
        echo "<script>alert('something wrong');</script>";
       echo "<script type='text/javascript'>document.location='select_dep.php';</script>";
    }}
  }//}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>student placement</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  	<div class="c1" style="background: white; border-radius: 10px;"><h2>Select Department</h2><hr>
  		<form action="" method="post">
            <div style="display: block; overflow-y: scroll; max-height: 400px;">
                <?php $n1=1;
                while($n1<=$counts){ ?>
  			<div class="two1">
  			 <label>Choice <?php echo $n1; ?>: </label>
  			 <select name="ch<?php echo $n1;?>" class="select" required>
  			 	<option value="">select Department</option>
                <?php 
                $se=mysqli_query($conn,"select *from department where stream='$stream' and semester='$semester'");
                    while($r1=mysqli_fetch_assoc($se)){
                        echo "
                <option value=".$r1['dsname'].">".$r1['dname']."</option>

                        ";
                    }

                ?>
  			 </select>
  			</div><?php $n1++; } ?></div>
  			<input type="submit" name="submit" class="submit" value="submit">
  		</form></div>
    </body>
</html>