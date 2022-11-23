<?php
   include('../conn.php');
   include('../session.php');
  $select=mysqli_query($conn,"select *from student");
  $counts=mysqli_num_rows($select);
  if(isset($_POST['sub'])){
    $s1=mysqli_query($conn,"select *from department");
    $ccccc=mysqli_num_rows($s1);
    if($ccccc>0){
      $number=0;
      while($fffff=mysqli_fetch_assoc($s1)){
        $dsname=$fffff['dsname'];
        $arr[$number]=$_POST[$dsname];
        $ary[$number]=$dsname;
        $number++;
      }
    }
    $sum=0;
    for($j=0;$j<$ccccc;$j++){
      $sum=$sum+$arr[$j];
    }
  	if($sum==$counts){
  	$n1=1;
  	while($n1<300){
      $n1++;
      for($k=0;$k<$ccccc;$k++){
      $select1=mysqli_query($conn,"select *from student where c1='$ary[$k]'");
      $c1=mysqli_num_rows($select1);
      if($c1>$arr[$k]){
        $d1=0;
        if($c1>0){
          $array=new SplFixedArray($c1);
          while($row=mysqli_fetch_assoc($select1)){ 
          $array[$d1]=$row['total'];
          $d1++;}   
        }
        for($i=1; $i<$c1;$i++){
              $key=$array[$i];
              $j=$i;
              while($j>0 && $array[$j-1]>$key){
                $array[$j]=$array[$j-1];
                $j--;
              }$array[$j]=$key;
        }
        $k1=new SplFixedArray($c1);
        $mee=$arr[$k]*0.2;
        $me=$c1-$arr[$k];
          $m1=1;
        for($m=$c1-1;$m>=$me;$m--){
          $k1[$m]=$array[$c1-$m1];
          $m1++;
        }
       /* for($m1=$me-1;$m1>=0;$m1--){
            $s9=mysqli_query($conn,"select *from student where total='$array[$m1]'");
            $num=mysqli_num_rows($s9);
            if($num>0){
            $fetch=mysqli_fetch_assoc($s9);
            if($fetch['gender']=="female"){
              if($mee>=1){
                $up= mysqli_query($conn,"update student set department='$ary[$k]' where total='$k1[$m1]'");
                $mee--;
                $array[$m1]=1;
                $me--;
              }
            }}
        }*/
        $mmm=300;
        for($t2=0;$t2<$c1;$t2++){
          if($array[$t2]==$k1[$t2]){
            $ss=mysqli_query($conn,"select *from student where total='$k1[$t2]'");
            $nn=mysqli_num_rows($ss);
            if($nn>1){
              while($rr=mysqli_fetch_assoc($ss)){
                $dep=$rr['c1'];
                if($dep==$ary[$k]){
               $up= mysqli_query($conn,"update student set department='$ary[$k]' where total='$k1[$t2]'");
                }
              }
            }else{
              $up= mysqli_query($conn,"update student set department='$ary[$k]' where total='$k1[$t2]'");
            }
          }else{
            if($array[$t2]==1){}else{
          if($array[$me]==$array[$me-1]){
            $aaa=$me-1;
            $mmm=$arr[$k]+1;
            if($k==0){
            $nnn=$arr[$k+1]-1;
            }else{
              $nnn=$arr[$k-1]-1;
            }
            $up= mysqli_query($conn,"update student set department='$ary[$k]' where total='$array[$aaa]'");
          }else{
          $t=$array[$t2];
          $s8=mysqli_query($conn,"select *from student where total='$t'");
          $r=mysqli_num_rows($s8);
          if($r>1){
            while($f1=mysqli_fetch_assoc($s8)){
              $dep=$f1['c1'];
              if($dep==$ary[$k]){
                for($t1=1;$t1<=$ccccc;$t1++){
                  $s=$t1+1;
                  if($t1==$ccccc){
                  $ch1=$f1['c1'];} else{
                    $c2="c$s";
                    $ch1=$f1[$c2];
        }
                  $c1="c$t";
          $update=mysqli_query($conn,"update student set $c1='$ch1' where total='$t'");
                 
                }
              }
            }
          }
          else{
          $f1=mysqli_fetch_assoc($s8);
          for($t1=1;$t1<=$ccccc;$t1++){
                  $s=$t1+1;
                  if($t1==$ccccc){
                  $ch=$f1['c1'];} else{
                    $ne="c$s";
                    $ch=$f1[$ne];
        }
                  $c1="c$t1";
          $update=mysqli_query($conn,"update student set $c1='$ch' where total='$t'");
                 
                }

          }}}
        }
        }if($mmm!=300){
        $arr[$k]=$mmm;
            if($k==0){
            $arr[$k+1]=$nnn;
            }else{
              $arr[$k-1]=$nnn;
            }
      }
      }else{
            if($c1>0){
              while($r1=mysqli_fetch_assoc($select1)){
                $d1=$r1['c1'];
                $id=$r1['ID'];
                $u1=mysqli_query($conn,"update student set department='$d1' where ID='$id'");
              }
            }
      }
    }
      
      echo "<script type='text/javascript'>document.location='std.php';</script>";
} echo "<script type='text/javascript'>document.location='std.php';</script>";
}else{
        echo "<script>alert('sum of department can't be much with total student');</script>";
      echo "<script type='text/javascript'>document.location='std.php';</script>";
    }
  	}
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Placement</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   <div class="s1">
   	<div class="top"><h1>Welcome to Student List</h1><div class="right"><h1>Total Student</h1><p><?php  echo $counts; ?></p></div></div><hr>
   	<table  class="table">
   		<thead>
   		<tr>
   			<th>R/N</th>
   			<th>Student ID</th>
   			<th>Password</th>
   			<th>Full Name</th>
   			<th>GPA</th>
   			<th>Region</th>
   			<th>Disablity</th>
   			<th>Enterance</th>
   			<th>Gender</th>
   			<th>COC</th>
   			<th>Total</th>
   			<th>Department</th>
   		</tr></thead>
   		<tbody>
   			<?php
   			$n1=1;
   			$count=mysqli_num_rows($select);
   			if($count>0){
   				while($row=mysqli_fetch_assoc($select)){
   					echo "
         <tr>
   			<td>".$n1."</td>
   			<td>".$row['student_id']."</td>
   			<td>".$row['password']."</td>
   			<td>".$row['fname']." ".$row['lname']."</td>
   			<td>".$row['grade']."</td>
   			<td>".$row['region']."</td>
   			<td>".$row['disability']."</td>
   			<td>".$row['enterance']."</td>
   			<td>".$row['gender']."</td>
   			<td>".$row['coc']."</td>
   			<td>".$row['total']."</td>
   			<td>".$row['department']."</td>
   		</tr>
   					";
   					$n1++;
   				}
   			}

   			?>
            <form action="" method="post">
   			<tr>
        <td colspan="6" bgcolor="gray" style="height: fit-content;">
                <?php
                    $ssss=mysqli_query($conn,"select *from department");
                    $cccc=mysqli_num_rows($ssss);
                    if($cccc>0){
                      while($ffff=mysqli_fetch_assoc($ssss)){
                        echo "
             <div class='left'><p>Num of ".$ffff['dname']."";?> </p><input type='number' name="<?php echo $ffff['dsname']; ?>"<?php echo " required class='in'></div>";
                      }
                    }
                ?></td>
   				<td colspan="6" bgcolor="seagreen"><input type="submit" name="sub" class="sub" value="Make Placement"></td>
   			
   			</tr></form>
   		
   	</tbody>
   	</table>
   </div>
</body>
</html>