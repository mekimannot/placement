<?php
   include('../conn.php');
   include('../session.php');
  $select=mysqli_query($conn,"select *from student");
  $counts=mysqli_num_rows($select);
  if(isset($_POST['sub'])){
  	$med=$_POST['med'];
  	$eng=$_POST['eng'];
  	$phar=$_POST['phar'];
  	$natural=$_POST['natural'];
  	$sum=$med+$eng+$phar+$natural;
  	if($sum==$counts){
  	$n1=1;
  	while($n1<100){
      $n1++;
  		$select1=mysqli_query($conn,"select *from student where c1='med'");
  		$select2=mysqli_query($conn,"select *from student where c1='phar'");
  		$select3=mysqli_query($conn,"select *from student where c1='eng'");
  		$select4=mysqli_query($conn,"select *from student where c1='natural'");
  		$c1=mysqli_num_rows($select1);
  		$c2=mysqli_num_rows($select2);
  		$c3=mysqli_num_rows($select3);
  		$c4=mysqli_num_rows($select4);
  		if($c1>$med){
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
  			}$k1=new SplFixedArray($c1);
        $mee=$med*0.2;
        $me=$c1-$med;
          $m1=1;
  			for($m=$c1-1;$m>=$me;$m--){
  				$k1[$m]=$array[$c1-$m1];
          $m1++;
  			}
        /*for($m1=$me-1;$m1>=0;$m1--){
            $s9=mysqli_query($conn,"select *from student where total='$array[$m1]'");
            $fetch=mysqli_fetch_assoc($s9);
            if($fetch['gender']=="female"){
              if($mee>=1){
                $up= mysqli_query($conn,"update student set department='med' where total='$k1[$m1]'");
                $mee--;
                $array[$m1]=1;
                $me--;
              }
            }
        }*/
        $mmm=300;
  			for($t2=0;$t2<$c1;$t2++){
          if($array[$t2]==$k1[$t2]){
            $ss=mysqli_query($conn,"select *from student where total='$k1[$t2]'");
            $nn=mysqli_num_rows($ss);
            if($nn>1){
              while($rr=mysqli_fetch_assoc($ss)){
                $dep=$rr['c1'];
                if($dep=="med"){
               $up= mysqli_query($conn,"update student set department='med' where total='$k1[$t2]'");
                }
              }
            }else{
              $up= mysqli_query($conn,"update student set department='med' where total='$k1[$t2]'");
            }
          }else{
            if($array[$t2]==1){}else{
          if($array[$me]==$array[$me-1]){
            $aaa=$me-1;
            $mmm=$med+1;
            $nnn=$natural-1;
            $up= mysqli_query($conn,"update student set department='med' where total='$array[$aaa]'");
          }else{
  				$t=$array[$t2];
  				$s8=mysqli_query($conn,"select *from student where total='$t'");
  				$r=mysqli_num_rows($s8);
          if($r>1){
            while($f1=mysqli_fetch_assoc($s8)){
              $dep=$f1['c1'];
              if($dep=="med"){
                $ch1=$f1['c1'];
          $ch2=$f1['c2'];
          $ch3=$f1['c3'];
          $ch4=$f1['c4'];
          $update=mysqli_query($conn,"update student set c1='$ch2',c2='$ch3',c3='$ch4',c4='$ch1' where total='$t'");
              }
            }
          }
          else{
          $f1=mysqli_fetch_assoc($s8);
          $ch1=$f1['c1'];
          $ch2=$f1['c2'];
          $ch3=$f1['c3'];
          $ch4=$f1['c4'];
          $update=mysqli_query($conn,"update student set c1='$ch2',c2='$ch3',c3='$ch4',c4='$ch1' where total='$t'");

          }}}
  			}
  			}if($mmm!=300){
        $med=$mmm;
        $natural=$nnn;
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
  		
  		if($c2>$phar){
  				$array=new SplFixedArray($c2);
  			//$array[$c2];
  			$d1=0;
  			if($c2>0){
  				while($r1=mysqli_fetch_assoc($select2)){
  				$array[$d1]=$r1['total'];
  				$d1++;
  			}
  			}
  			for($i=1; $i<$c2;$i++){
              $key=$array[$i];
              $j=$i;
              while($j>0 && $array[$j-1]>$key){
              	$array[$j]=$array[$j-1];
              	$j--;
              }$array[$j]=$key;
  			}$k2=new SplFixedArray($c2);
        $mee=$phar*0.2;
        $ph=$c2-$phar+$mee;
          $m1=1;
  			for($m=$c2-1;$m>=$ph;$m--){
  				$k2[$m]=$array[$c2-$m1];
          $m1++;
  			}
        for($m1=$ph-1;$m1>=0;$m1--){
            $s9=mysqli_query($conn,"select *from student where total='$array[$m1]'");
            $fetch=mysqli_fetch_assoc($s9);
            if($fetch['gender']=="female"){
              if($mee>=1){
                $up= mysqli_query($conn,"update student set department='phar' where total='$k2[$m1]'");
                $mee--;
                $array[$m1]=1;
                $ph--;
              }
            }
        }
        $ppp=300;
  			for($t2=0;$t2<$c2;$t2++){
  			 if($array[$t2]==$k2[$t2]){
            $ss=mysqli_query($conn,"select *from student where total='$k2[$t2]'");
            $nn=mysqli_num_rows($ss);
            if($nn>1){
              while($rr=mysqli_fetch_assoc($ss)){
                $dep=$rr['c1'];
                if($dep=="phar"){
                  $up= mysqli_query($conn,"update student set department='phar' where total='$k2[$t2]'");
                }
              }
            }else{
             $up= mysqli_query($conn,"update student set department='phar' where total='$k2[$t2]'"); 
           }
  			 }else{
            if($array[$t2]==1){}else{
          if($array[$ph]==$array[$ph-1]){
            $aaa=$ph-1;
            $ppp=$phar+1;
            $eee=$eng-1;
            $up= mysqli_query($conn,"update student set department='phar' where total='$array[$aaa]'");
          }else{
  				$t=$array[$t2];
  				$s8=mysqli_query($conn,"select *from student where total='$t'");
          $r=mysqli_num_rows($s8);
          if($r>1){
            while($f1=mysqli_fetch_assoc($s8)){
              $dep=$f1['c1'];
              if($dep=="phar"){
                $ch1=$f1['c1'];
          $ch2=$f1['c2'];
          $ch3=$f1['c3'];
          $ch4=$f1['c4'];
          $update=mysqli_query($conn,"update student set c1='$ch2',c2='$ch3',c3='$ch4',c4='$ch1' where total='$t'");
              }
            }
          }else{
            $f1=mysqli_fetch_assoc($s8);
            $ch1=$f1['c1'];
          $ch2=$f1['c2'];
          $ch3=$f1['c3'];
          $ch4=$f1['c4'];
          $update=mysqli_query($conn,"update student set c1='$ch2',c2='$ch3',c3='$ch4',c4='$ch1' where total='$t'");
        }}}
  			}
  			}if($ppp!=300){
        $phar=$ppp;
        $eng=$eee;
      }
  		}else{
            if($c2>0){
            	while($r1=mysqli_fetch_assoc($select2)){
            		$d1=$r1['c1'];
            		$id=$r1['ID'];
            		$u1=mysqli_query($conn,"update student set department='$d1' where ID='$id'");
            	}
            }
  		}
  		if($c3>$eng){
  				$array=new SplFixedArray($c3);
  			$d1=0;
  			if($c3>0){
  				while($r1=mysqli_fetch_assoc($select3)){
  				$array[$d1]=$r1['total'];
  				$d1++;
  			}
  			}
  			for($i=1; $i<$c3;$i++){
              $key=$array[$i];
              $j=$i;
              while($j>0 && $array[$j-1]>$key){
              	$array[$j]=$array[$j-1];
              	$j--;
              }$array[$j]=$key;
  			}$k3=new SplFixedArray($c3);
        $mee=$eng*0.2;
        $en=$c3-$eng+$mee;
          $m1=1;
  			for($m=$c3-1;$m>=$en;$m--){
  				$k3[$m]=$array[$c3-$m1];
          $m1++;
  			}
        for($m1=$en-1;$m1>=0;$m1--){
            $s9=mysqli_query($conn,"select *from student where total='$array[$m1]'");
            $fetch=mysqli_fetch_assoc($s9);
            if($fetch['gender']=="female"){
              if($mee>=1){
                $up= mysqli_query($conn,"update student set department='eng' where total='$k3[$m1]'");
                $mee--;
                $array[$m1]=1;
                $en--;
              }
            }
        }
        $nnn=300;
  			for($t2=0;$t2<$c3;$t2++){
  			  if($array[$t2]==$k3[$t2]){
            $ss=mysqli_query($conn,"select *from student where total='$k3[$t2]'");
            $nn=mysqli_num_rows($ss);
            if($nn>1){
              while($rr=mysqli_fetch_assoc($ss)){
                $dep=$rr['c1'];
                if($dep=="eng"){
                  $up= mysqli_query($conn,"update student set department='eng' where total='$k3[$t2]'");
                }
              }
            }else{
             $up= mysqli_query($conn,"update student set department='eng' where total='$k3[$t2]'"); 
           }
  			  }else{
            if($array[$t2]==1){}else{
          if($array[$en]==$array[$en-1]){
            $aaa=$en-1;
            $eee=$eng+1;
            $nnn=$natural-1;
            $up= mysqli_query($conn,"update student set department='eng' where total='$array[$aaa]'");
          }else{
  				$t=$array[$t2];
  				$s8=mysqli_query($conn,"select *from student where total='$t'");
          $r=mysqli_num_rows($s8);
          if($r>1){
              while($f1=mysqli_fetch_assoc($s8)){
                $dep=$f1['c1'];
                if($dep=="eng"){
                  $ch1=$f1['c1'];
          $ch2=$f1['c2'];
          $ch3=$f1['c3'];
          $ch4=$f1['c4'];
          $update=mysqli_query($conn,"update student set c1='$ch2',c2='$ch3',c3='$ch4',c4='$ch1' where total='$t'");
                }
              }
            }else{
          $f1=mysqli_fetch_assoc($s8);
          $ch1=$f1['c1'];
          $ch2=$f1['c2'];
          $ch3=$f1['c3'];
          $ch4=$f1['c4'];
          $update=mysqli_query($conn,"update student set c1='$ch2',c2='$ch3',c3='$ch4',c4='$ch1' where total='$t'");
           }}}
  			}
  			}if($nnn!=300){
        $natural=$nnn;
        $eng=$eee;
      }
  		}else{
            if($c3>0){
            	while($r1=mysqli_fetch_assoc($select3)){
            		$d1=$r1['c1'];
            		$id=$r1['ID'];
            		$u1=mysqli_query($conn,"update student set department='$d1' where ID='$id'");
            	}
            }
  		}
  		
  		if($c4>$natural){
  				$array=new SplFixedArray($c4);
  			$d1=0;
  			if($c4>0){
  				while($r1=mysqli_fetch_assoc($select4)){
  				$array[$d1]=$r1['total'];
  				$d1++;
  			}
  			}
  			for($i=1; $i<$c4;$i++){
              $key=$array[$i];
              $j=$i;
              while($j>0 && $array[$j-1]>$key){
              	$array[$j]=$array[$j-1];
              	$j--;
              }$array[$j]=$key;
  			}$k4=new SplFixedArray($c4);
        $mee=$natural*0.2;
        $na=$c4-$natural+$mee;
          $m1=1;
  			for($m=$c4-1;$m>=$na;$m--){
  				$k4[$m]=$array[$c4-$m1];
          $m1++;
  			}
        for($m1=$na-1;$m1>=0;$m1--){
            $s9=mysqli_query($conn,"select *from student where total='$array[$m1]'");
            $fetch=mysqli_fetch_assoc($s9);
            if($fetch['gender']=="female"){
              if($mee>=1){
                $up= mysqli_query($conn,"update student set department='natural' where total='$k4[$m1]'");
                $mee--;
                $array[$m1]=1;
                $na--;
              }
            }
        }
        $nnn=300;
  			for($t2=0;$t2<$c4;$t2++){
  			if($array[$t2]==$k4[$t2]){
          $ss=mysqli_query($conn,"select *from student where total='$k4[$t2]'");
            $nn=mysqli_num_rows($ss);
            if($nn>1){
              while($rr=mysqli_fetch_assoc($ss)){
                $dep=$rr['c1'];
                if($dep=="natural"){
                  $up= mysqli_query($conn,"update student set department='natural' where total='$k4[$t2]'");
                }
              }
            }else{
             $up= mysqli_query($conn,"update student set department='natural' where total='$k4[$t2]'"); 
           }
  			}else{
          if($array[$t2]==1){}else{
            if($array[$na]==$array[$na-1]){
              $aaa=$na-1;
            $nnn=$natural+1;
            $eee=$eng-1;
            $up= mysqli_query($conn,"update student set department='natural' where total='$array[$aaa]'");
          }else{
  				$t=$array[$t2];
  				$s8=mysqli_query($conn,"select *from student where total='$t'");
          $nn=mysqli_num_rows($s8);
            if($nn>1){
              while($f1=mysqli_fetch_assoc($s8)){
                $dep=$f1['c1'];
                if($dep=="natural"){
          $ch1=$f1['c1'];
          $ch2=$f1['c2'];
          $ch3=$f1['c3'];
          $ch4=$f1['c4'];
          $update=mysqli_query($conn,"update student set c1='$ch2',c2='$ch3',c3='$ch4',c4='$ch1' where total='$t'");
                }
              }
            }else{
          $f1=mysqli_fetch_assoc($s8);
          $ch1=$f1['c1'];
          $ch2=$f1['c2'];
          $ch3=$f1['c3'];
          $ch4=$f1['c4'];
          $update=mysqli_query($conn,"update student set c1='$ch2',c2='$ch3',c3='$ch4',c4='$ch1' where total='$t'");
           }}}
  			}
  			}if($nnn!=300){
        $natural=$nnn;
        $eng=$eee;
      }
  		}else{
            if($c4>0){
            	while($r1=mysqli_fetch_assoc($select4)){
            		$d1=$r1['c1'];
            		$id=$r1['ID'];
            		$u1=mysqli_query($conn,"update student set department='$d1' where ID='$id'");
            	}
            }
  		}
  		if($c1=='$med' && $c2=='$phar' && $c3=='$eng' && $c4=='$natural'){
  			$n1=200;
    }
  		
      echo "<script type='text/javascript'>document.location='student_list.php';</script>";
}echo "<script type='text/javascript'>document.location='student_list.php';</script>";
}else{
        echo "<script>alert('sum of department can't be much with total student');</script>";
     // echo "<script type='text/javascript'>document.location='add_student.php';</script>";
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
   				<td colspan="2" bgcolor="gray"><div class=""><p>Num of Medicine </p><input type="number" name="med" required class="in"></div></td>
   				<td colspan="2" bgcolor="gray"><div class=""><p>Num of Engineering </p><input type="number" name="eng" required class="in"></div></td>
   				<td colspan="2" bgcolor="gray"><div class=""><p>Num of Pharmacy</p> <input type="number" name="phar" required class="in"></div></td>
   				<td colspan="2" bgcolor="gray"><div class=""><p>Num of Natural Science</p> <input type="number" name="natural" required class="in"></div></td>
   				<td colspan="4" bgcolor="seagreen"><input type="submit" name="sub" class="sub" value="Make Placement"></td>
   			
   			</tr></form>
   		
   	</tbody>
   	</table>
   </div>
</body>
</html>