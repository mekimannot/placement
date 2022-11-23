<?php
   include('../conn.php');
   include('../session.php');
   $select=mysqli_query($conn,"select *from student where ID='$session_id'");
   $row=mysqli_fetch_assoc($select);
   $dep=$row['department'];
   $stream=$row['stream'];
   $semester=$row['semester'];
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
    $update=mysqli_query($conn,"update student set $c='$array[$i]'  where ID='$session_id'");
}
    if($update){
        echo "<script type='text/javascript'>alert('seccussfuly updated');</script>";
        echo "<script type='text/javascript'>document.location='index.php';</script>";
        
    }else{
        echo "<script>alert('something wrong');</script>";
       echo "<script type='text/javascript'>document.location='index.php';</script>";
    }}
  }//}
  if(!isset($_SERVER['HTTP_REFERER'])){
   header('../403.php');
   exit;
}
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
  <div class="r1">
  	<div class="c1"><h2>Select Department</h2><hr>
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
  	<div class="c2">
  		<h2>Student Information</h2>
  		<hr><div class="two5">
  			 <label>Full Name: </label>
  			 <input style="background: gray; color: white;" type="text" name="" value="<?php echo $row['fname']; echo " ";echo $row['mname']; echo " "; echo $row['lname']; ?>" class="select" readonly>
  			</div>
  			<div class="two6">
  			 <label>Total Grade: </label>
  			 <input style="background: gray; color: white;" type="text" name="" value="<?php echo $row['total'];?>" class="select" readonly>
  			</div>
  			<div class="two7">
  			 <label>Region: </label>
  			 <input style="background: gray; color: white;" type="text" name="" value="<?php echo $row['region']; ?>" class="select" readonly>
  			</div>
  			<div class="two8">
  			 <label>Department: </label>
  			 <input style="background: gray; color: white;" type="text" name="" value="<?php  if($row['department']=="eng"){ echo "Engineering";} else if($row['department']=="med"){ echo "Medicine";} else if($row['department']=="phar"){ echo "Pharmacy";} else if($row['department']=="natural"){ echo "Natural Science";} else{ echo "Waiting for Placement";} ?>" class="select" readonly>
  			</div>
                <h2>department choice order</h2>
                <hr>
  			<div class="two" style="overflow-x: scroll;">
  				<table border="1" class="t">
  					<tr>
                        <?php for($j=1;$j<=$counts;$j++){
                            $c="c$j";
                            $c1=$row[$c];
                            $sel=mysqli_query($conn,"select *from department where dsname='$c1' and stream='$stream' and semester='$semester'");
                            $num=mysqli_num_rows($sel);
                            echo "
                        <th>Choice ".$j."</th>
                        ";
                        } ?>
  					</tr>
  					<tr>
                        <?php for($j=1;$j<=$counts;$j++){
                            $c="c$j";
                            $c1=$row[$c];
                            $sel=mysqli_query($conn,"select *from department where dsname='$c1' and stream='$stream' and semester='$semester'");
                            $num=mysqli_num_rows($sel);
                            if($num>0){
                            $fetch=mysqli_fetch_assoc($sel);
                            echo "
                        <td>".$fetch['dname']."</td>
                            ";}else if($num==0){
                                echo "<td>waiting for placement</td>";
                            }
                        } ?>
  					</tr>
  				</table>
  			</div>
  	</div>
  </div>
</body>
</html>