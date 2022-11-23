<?php
   include('../conn.php');
   include('../session.php');
   $stream=$_SESSION['stream'];
   $semester=$_SESSION['semester'];
  $select=mysqli_query($conn,"select *from student where stream='$stream' and semester='$semester'");
  $counts=mysqli_num_rows($select);
  if(isset($_POST['sub'])){
    $s1=mysqli_query($conn,"select *from department where stream='$stream' and semester='$semester'");
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
    while($n1<=$ccccc){
      $n1++;
      for($k=0;$k<$ccccc;$k++){
      $select1=mysqli_query($conn,"select *from student where c1='$ary[$k]' and stream='$stream' and semester='$semester'");
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
        $total=$me+$mee-1;
        if($total>=$me){
        for($p=0;$p<=$total; $p++){
        }$p--;
        $eq=1;
        if($array[$p]==$array[$p+1]){
          $eq=2;
          $equal=$array[$p];
        }
        if($p>=$me){
        $m1=0;
        $p1=$p-$me+1;
              if($p1>=1){
        for($l1=$p;$l1>=0;$l1--){
          $s2=mysqli_query($conn,"select *from student where total='$array[$l1]' and c1='$ary[$k]' and gender='female' and stream='$stream' and semester='$semester'");
          $fetch=mysqli_num_rows($s2);
          if($fetch>0){
                $temp=$array[$p-$m1];
                $array[$p-$m1]=$array[$l1];
                $array[$l1]=$temp;
                $p1--;
                $m1++;
          }

        }}}}
        //else{
        for($m=0;$m<$me;$m++){
          $t=$array[$m];
          $s8=mysqli_query($conn,"select *from student where total='$t' and c1='$ary[$k]' and stream='$stream' and semester='$semester'");
          $r=mysqli_num_rows($s8);
          $s10=mysqli_query($conn,"select *from student where total='$t' and c1='$ary[$k]' and gender='female' and stream='$stream' and semester='$semester'");
          $r5=mysqli_num_rows($s8);
          if($r5>=$mee){

          }if($m==$me-1){
            if($eq==2){
              $select3=mysqli_query($conn,"select *from student where total='$equal' and c1='$ary[$k]' and stream='$stream' and semester='$semester'");
              $num=mysqli_num_rows($select3);
              if($num>1){
                $nn=0;
                while($rr1=mysqli_fetch_assoc($select3)){
                  $tran[$nn]=$rr1['transcript1'];
                  $nn++;
                }//
                $number=0;
                for($nn2=$me;$nn2<$c1;$nn2++){
                    if($equal==$array[$nn2]){
                      $number++;
                    }
                }
        for($ii1=1; $ii1<$num;$ii1++){
              $key1=$tran[$ii1];
              $jj1=$ii1;
              while($jj1>0 && $tran[$jj1-1]>$key1){
                $tran[$jj1]=$tran[$jj1-1];
                $jj1--;
              }$tran[$jj1]=$key1;
        }
        $diff=$num-$number;
                for($nn1=$diff-1;$nn1>=0;$nn1--){
                  if($nn1==$diff-1){
                  if($tran[$diff-1]==$tran[$diff]){
                     $select5=mysqli_query($conn,"select *from student where transcript1='$tran[$diff]' and c1='$ary[$k]' and stream='$stream' and semester='$semester'");
                     $num1=mysqli_num_rows($select5);

              if($num1>1){
                $nnn=0;
                while($rr2=mysqli_fetch_assoc($select5)){
                  $tran1[$nnn]=$rr2['transcript2'];
                  $nnn++;
                }//
                $number1=0;
                for($nn3=$diff;$nn3<$c1;$nn3++){
                    if($tran[$diff]==$tran[$nn3]){
                      $number1++;
                    }
                }
        for($ii2=1;$ii2<$num1;$ii2++){
              $key2=$tran1[$ii2];
              $jj2=$ii2;
              while($jj2>0 && $tran1[$jj2-1]>$key2){
                $tran1[$jj2]=$tran1[$jj2-1];
                $jj2--;
              }$tran1[$jj2]=$key2;
        }
        $diff1=$num1-$number1;
                for($nn4=$diff1-1;$nn4>=0;$nn4--){
                  //
                  $select4=mysqli_query($conn,"select *from student where transcript2='$tran1[$nn4]' and stream='$stream' and semester='$semester'");
                  $f1=mysqli_fetch_assoc($select4);
          for($t1=1;$t1<=$ccccc;$t1++){
          $s=$t1+1;
          if($t1==$ccccc){
          $ch=$f1['c1'];} else{
          $ne="c$s";
          $ch=$f1[$ne];
        }
                  $c1="c$t1";
          $update=mysqli_query($conn,"update student set $c1='$ch' where transcript2='$tran1[$nn4]' and stream='$stream' and semester='$semester'");
        }
                  //}
                }
              }
                  }else{
                  //
                  $select4=mysqli_query($conn,"select *from student where transcript1='$tran[$nn1]' and stream='$stream' and semester='$semester'");
                  $f1=mysqli_fetch_assoc($select4);
          for($t1=1;$t1<=$ccccc;$t1++){
          $s=$t1+1;
          if($t1==$ccccc){
          $ch=$f1['c1'];} else{
          $ne="c$s";
          $ch=$f1[$ne];
        }
                  $c1="c$t1";
          $update=mysqli_query($conn,"update student set $c1='$ch' where transcript1='$tran[$nn1]' and stream='$stream' and semester='$semester'");
        }}
                }else{
                  //
                  $select4=mysqli_query($conn,"select *from student where transcript1='$tran[$nn1]' and stream='$stream' and semester='$semester'");
                  $f1=mysqli_fetch_assoc($select4);
          for($t1=1;$t1<=$ccccc;$t1++){
          $s=$t1+1;
          if($t1==$ccccc){
          $ch=$f1['c1'];} else{
          $ne="c$s";
          $ch=$f1[$ne];
        }
                  $c1="c$t1";
          $update=mysqli_query($conn,"update student set $c1='$ch' where transcript1='$tran[$nn1]' and stream='$stream' and semester='$semester'");
        }}//
                  //}
                }
              }else{
          $s8=mysqli_query($conn,"select *from student where total='$t' and c1='$ary[$k]' and stream='$stream' and semester='$semester'");
          $f1=mysqli_fetch_assoc($s8);
          $id=$f1['ID'];
          for($t1=1;$t1<=$ccccc;$t1++){
          $s=$t1+1;
          if($t1==$ccccc){
          $ch=$f1['c1'];} else{
          $ne="c$s";
          $ch=$f1[$ne];
        }
                  $c1="c$t1";
          $update=mysqli_query($conn,"update student set $c1='$ch' where total='$t' and ID='$id' and stream='$stream' and semester='$semester'");
        }}
            }else{
          $s8=mysqli_query($conn,"select *from student where total='$t' and c1='$ary[$k]' and stream='$stream' and semester='$semester'");
          $f1=mysqli_fetch_assoc($s8);
          $id=$f1['ID'];
          for($t1=1;$t1<=$ccccc;$t1++){
          $s=$t1+1;
          if($t1==$ccccc){
          $ch=$f1['c1'];} else{
          $ne="c$s";
          $ch=$f1[$ne];
        }
                  $c1="c$t1";
          $update=mysqli_query($conn,"update student set $c1='$ch' where total='$t' and ID='$id' and stream='$stream' and semester='$semester'");
        }}
          }else{
            if($eq==2){
               if($equal==$t){}
                else{
          $s8=mysqli_query($conn,"select *from student where total='$t' and c1='$ary[$k]' and stream='$stream' and semester='$semester'");
                  $f1=mysqli_fetch_assoc($s8);
          $id=$f1['ID'];
          for($t1=1;$t1<=$ccccc;$t1++){
          $s=$t1+1;
          if($t1==$ccccc){
          $ch=$f1['c1'];} else{
          $ne="c$s";
          $ch=$f1[$ne];
        }
                  $c1="c$t1";
          $update=mysqli_query($conn,"update student set $c1='$ch' where total='$t' and ID='$id' and stream='$stream' and semester='$semester'");
        }
                }
            }else{
          $s8=mysqli_query($conn,"select *from student where total='$t' and c1='$ary[$k]' and stream='$stream' and semester='$semester'");
          $f1=mysqli_fetch_assoc($s8);
          $id=$f1['ID'];
          for($t1=1;$t1<=$ccccc;$t1++){
          $s=$t1+1;
          if($t1==$ccccc){
          $ch=$f1['c1'];} else{
          $ne="c$s";
          $ch=$f1[$ne];
        }
                  $c1="c$t1";
          $update=mysqli_query($conn,"update student set $c1='$ch' where total='$t' and ID='$id' and stream='$stream' and semester='$semester'");
        }}}
        }
      }
    }
      
      echo "<script type='text/javascript'>document.location='student_placement.php';</script>";
} echo "<script type='text/javascript'>document.location='student_placement.php';</script>";
    
      for($w=0;$w<$ccccc;$w++){
      $select2=mysqli_query($conn,"select *from student where c1='$ary[$w]' and stream='$stream' and semester='$semester'");
      $c2=mysqli_num_rows($select2);
      if($c2>0){
        while($r2=mysqli_fetch_assoc($select2)){
          $id=$r2['ID'];
          $update=mysqli_query($conn,"update student set department='$ary[$w]' where ID='$id' and stream='$stream' and semester='$semester'");
        }
      }
    }
}else{
        echo "<script>alert('sum of department can't be much with total student');</script>";
      echo "<script type='text/javascript'>document.location='student_placement.php';</script>";
    }
    }
  if(isset($_POST['search'])){
    $searc=$_POST['searc'];
    $select=mysqli_query($conn,"select *from student where student_id='$searc'");
  }
  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Placement</title>
  <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/3012035e7a.js" crossorigin="anonymous"></script>
      <link href="../fontawesome/css/fontawesome.css" rel="stylesheet">
      <link href="../fontawesome/css/brands.css" rel="stylesheet">
      <link href="../fontawesome/css/solid.css" rel="stylesheet">
      <style type="text/css">
        .search:hover{
          background: #367fa9;
          border-radius: 10px 10px 10px 10px;
        }.search{
          margin-right: 40px;
        }
        .number input{
          height: 30px;
          width: 35px;
        }.input{
          border-radius: 10px 0px 0px 10px;
        }.ser{
          height: 40px;
          border-radius: 0px 10px 10px 0px; 
          width: 60px; 
          background: #3c8dbc; 
          color: white; 
          border: 1px solid #367fa9;
        }
      </style>
</head>
<body>
   <div class="s1">
    <div class="top"><h1>Welcome to Student List</h1><div class="right"><h1>Total Student</h1><p><?php  echo $counts; ?></p></div></div><hr>
    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
      <form action="" method="post">
      <div class="number">
        <select name="number" style="width: fit-content; height: 30px; border: 1px solid black;">
          <option value="5">5</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
          <option value="500">500</option>
        </select>
        <input type="submit" name="ok" value="Ok">
      </div></form><form action="" method="post">
        <div class="search"><input type="search" name="searc" class="input serinput"><input type="submit" name="search" value="search" class="ser"></div></form>
    </div>
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
        <th>Stream</th>
        <th>Semester</th>
        <th>COC</th>
        <th>Total</th>
        <th>Transcript 11-12</th>
        <th>Transcript 9-10</th>
        <th>Department</th>
        <th>Action</th>
      </tr></thead>
      <tbody>
        <div style="overflow-y: scroll; max-height: 200px">
        <?php
        if(isset($_POST['ok'])){
          $d=$_POST['number'];
        }else{
          $d=5;
        }
        $n1=1;
        $n2=1;
        $count=mysqli_num_rows($select);
        if($count>0){
          while($row=mysqli_fetch_assoc($select) and $n2<=$d){
            $enterance=$row['enterance']*20;
            echo "
         <tr>
        <td>".$n1."</td>
        <td>".$row['student_id']."</td>
        <td>".$row['password']."</td>
        <td>".$row['fname']." ".$row['mname']." ".$row['lname']."</td>
        <td>".$row['grade']."</td>
        <td>".$row['region']."</td>
        <td>".$row['disability']."</td>
        <td>".$enterance."</td>
        <td>".$row['gender']."</td>
        <td>".$row['stream']."</td>
        <td>".$row['semester']."</td>
        <td>".$row['coc']."</td>
        <td>".$row['total']."</td>
        <td>".$row['transcript1']."</td>
        <td>".$row['transcript2']."</td>
        <td>".$row['department']."</td>
        <td><a href='edit_student.php?id=".$row['ID']."' target='frame'><div style='display: flex;'><i class='fa-solid fa-edit' ></i><p style='margin-left: 3px;'>Edit</p></div></a></td>
      </tr>
            ";
            $n1++;
            $n2++;
          }
        }

        ?>
        </div>    
        <form action="" method="post">
        <tr>
        <td colspan="9" bgcolor="gray" style="height: fit-content;">
          <div style="overflow-y: scroll; max-height: 150px;">
                <?php
                    $ssss=mysqli_query($conn,"select *from department where stream='$stream' and semester='$semester'");
                    $cccc=mysqli_num_rows($ssss);

                    if($cccc>0){
                      while($ffff=mysqli_fetch_assoc($ssss)){
                        echo "
             <div class='left'><p>Number of ".$ffff['dname']."";?> </p><input type='number' name="<?php echo $ffff['dsname']; ?>"<?php echo " required class='in'></div>";
                      }
                    }
                ?></td></div>
          <td colspan="8" bgcolor="seagreen"><input type="submit" name="sub" class="sub" value="Make Placement"></td>
        
        </tr></form>
      
    </tbody>
    </table>
   </div>
</body>
</html>