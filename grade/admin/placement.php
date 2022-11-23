<?php
   include('../conn.php');
   include('../session.php');
   $stream=$_SESSION['stream'];
   $semester=$_SESSION['semester'];
   $year=$_SESSION['year'];
  $select=mysqli_query($conn,"select *from student where stream='$stream' and semester='$semester' and year='$year'");
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
    while($n1<=10){
      $n1++;
      for($k=0;$k<$ccccc;$k++){
      $select1=mysqli_query($conn,"select *from student where c1='$ary[$k]' and stream='$stream' and semester='$semester' and year='$year'");
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
        $equal=777;
          $eq=440;
          //
          $female_number=0;
        if($total>=$me){
        for($p=0;$p<=$total; $p++){
        }$p--;
        if($p>=$me){
        $m1=0;
        $p1=$p-$me+1;
        //$female_number=0;
        $const_female=$p1;
        for($female=0;$female<=$p;$female++){
          $select_female=mysqli_query($conn,"select *from student where total='$array[$female]' and c1='$ary[$k]' and gender='female' and stream='$stream' and semester='$semester' and year='$year'");
          $number_of_female=mysqli_num_rows($select_female);
          if($number_of_female>0){
            $female_number++;
          }
        }
        $affir=0;
            if($female_number>=$const_female){
              $affir_female=new SplFixedArray($female_number);
      $me=$me+$const_female;
        $l1=$p;
        while($l1>=0 && $p1>=1){
          $s2=mysqli_query($conn,"select *from student where total='$array[$l1]' and c1='$ary[$k]' and gender='female' and stream='$stream' and semester='$semester' and year='$year'");
          $fetch=mysqli_num_rows($s2);
          if($fetch>0){/*
                $temp=$array[$p-$m1];
                $array[$p-$m1]=$array[$l1];
                $array[$l1]=$temp;*/
                $affir_female[$affir]=$array[$l1];
                $affir++;
                $p1--;
                $m1++;
          }$l1--;

        }}else if($female_number<=0){}
        else{
              $affir_female=new SplFixedArray($female_number);
          $p2=$me+$female_number-1;
          $l1=$p;
        $me=$me+$female_number;
        while($l1>=0 && $p1>=1){
          $s2=mysqli_query($conn,"select *from student where total='$array[$l1]' and c1='$ary[$k]' and gender='female' and stream='$stream' and semester='$semester' year='$year'");
          $fetch=mysqli_num_rows($s2);
          if($fetch>0){
            if($l1>$p2){
              $p2--;
            }else{/*
                $temp=$array[$p2-$m1];
                $array[$p2-$m1]=$array[$l1];
                $array[$l1]=$temp;*/
                $affir_female[$affir]=$array[$l1];
                $affir++;
                $p1--;
                $m1++;}
          }$l1--;

        }
        }
        }}//
        $exit=0;
        for($e1=0;$e1<$me;$e1++){
           for($e2=$me;$e2<$c1;$e2++){
            if($array[$e1]==$array[$e2]){
              $exit=1;
              $equal=$array[$e1];
            }
           }
        }//
        if($exit==1){
          $select3=mysqli_query($conn,"select *from student where total='$equal' and c1='$ary[$k]' and stream='$stream' and semester='$semester' and year='$year'");
          $num=mysqli_num_rows($select3);
          if($num>1){
                $nn=0;
                if($num>0){
                while($rr1=mysqli_fetch_assoc($select3)){
                  $tran[$nn]=$rr1['transcript1'];
                  $nn++;
                }}
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
                $eq=$tran[$diff];
                $select5=mysqli_query($conn,"select *from student where transcript1='$eq' and total='$equal' and c1='$ary[$k]' and stream='$stream' and semester='$semester' and year='$year'");
                $num1=mysqli_num_rows($select5);
                if($num1>1){
                  $nnn=0;
                while($rr2=mysqli_fetch_assoc($select5)){
                  $tran1[$nnn]=$rr2['transcript2'];
                  $nnn++;
                }$number1=0;
                for($nn3=$diff;$nn3<$num;$nn3++){
                    if($tran[$diff]==$tran[$nn3]){
                      $number1++;
                    }
                }
                for($ii1=1; $ii1<$num1;$ii1++){
              $key1=$tran1[$ii1];
              $jj1=$ii1;
              while($jj1>0 && $tran1[$jj1-1]>$key1){
                $tran1[$jj1]=$tran1[$jj1-1];
                $jj1--;
              }$tran1[$jj1]=$key1;
        }
        $diff1=$num1-$number1;
                for($nn4=0;$nn4<$diff1;$nn4++){
                  //
                  $select_to_update=mysqli_query($conn,"select *from student where transcript2='$tran1[$nn4]' and total='$equal' and transcript1='$eq' and c1='$ary[$k]' and stream='$stream' and semester='$semester' and year='$year'");
                  $f1=mysqli_fetch_assoc($select_to_update);
                  $stu_id=$f1['ID'];
          for($t1=1;$t1<=$ccccc;$t1++){
          $s=$t1+1;
          if($t1==$ccccc){
          $ch=$f1['c1'];} else{
          $ne="c$s";
          $ch=$f1[$ne];
        }
                  $c1="c$t1";
          $updat=mysqli_query($conn,"update student set $c1='$ch' where ID='$stu_id'");
        }
                //
                }
              }
            }else{
                  //
              if($eq==$tran[$nn1]){}else{
                  $update_select=mysqli_query($conn,"select *from student where transcript1='$tran[$nn1]' and total='$equal' and c1='$ary[$k]' and stream='$stream' and semester='$semester' and year='$year'");
                  $number_update=mysqli_num_rows($update_select);
                  if($number_update>0){
                  $f1=mysqli_fetch_assoc($update_select);
                  $stu_id=$f1['ID'];
          for($t1=1;$t1<=$ccccc;$t1++){
          $s=$t1+1;
          if($t1==$ccccc){
          $ch=$f1['c1'];} else{
          $ne="c$s";
          $ch=$f1[$ne];
        }
                  $c1="c$t1";
          $upd=mysqli_query($conn,"update student set $c1='$ch' where ID='$stu_id'");
        }}}}
          }
          else{
                  //

            if($eq==$tran[$nn1]){}else{
                  $update_select=mysqli_query($conn,"select *from student where transcript1='$tran[$nn1]' and total='$equal' and c1='$ary[$k]' and stream='$stream' and semester='$semester' and year='$year'");
                  $number_update=mysqli_num_rows($update_select);
                  if($number_update>0){
                  $f1=mysqli_fetch_assoc($update_select);
                  $stu_id=$f1['ID'];
          for($t1=1;$t1<=$ccccc;$t1++){
          $s=$t1+1;
          if($t1==$ccccc){
          $ch=$f1['c1'];} else{
          $ne="c$s";
          $ch=$f1[$ne];
        }
                  $c1="c$t1";
          $updt=mysqli_query($conn,"update student set $c1='$ch' where ID='$stu_id'");
        }}}}
          //}
        }
        }
      }
        //
        for($m=0;$m<$me;$m++){
          $t=$array[$m];
          $female_take=0;
          if($female_number>0){
              for($ft=0;$ft<$female_number;$ft++){
                if($affir_female[$ft]==$t){
                  $female_take=1;
                }
              }
          }
          $s8=mysqli_query($conn,"select *from student where total='$t' and c1='$ary[$k]' and stream='$stream' and semester='$semester' and year='$year'");
          $r=mysqli_num_rows($s8);
          $s10=mysqli_query($conn,"select *from student where total='$t' and c1='$ary[$k]' and gender='female' and stream='$stream' and semester='$semester' and year='$year'");
          $r5=mysqli_num_rows($s8);
          if($r5>=$mee){

          }
          if($equal==$t || $female_take==1){}
          else{
           
          $s8=mysqli_query($conn,"select *from student where total='$t' and c1='$ary[$k]' and stream='$stream' and semester='$semester' and year='$year'");
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
          $update=mysqli_query($conn,"update student set $c1='$ch' where total='$t' and ID='$id' and stream='$stream' and semester='$semester' and year='$year'");
        }}
      }
        }echo "<script type='text/javascript'>document.location='placement.php';</script>";
      }
      
      
} echo "<script type='text/javascript'>document.location='placement.php';</script>";
    
      for($w=0;$w<$ccccc;$w++){
      $select2=mysqli_query($conn,"select *from student where c1='$ary[$w]' and stream='$stream' and semester='$semester' and year='$year'");
      $c2=mysqli_num_rows($select2);
      if($c2>0){
        while($r2=mysqli_fetch_assoc($select2)){
          $id=$r2['ID'];
          $update=mysqli_query($conn,"update student set department='$ary[$w]' where ID='$id' and stream='$stream' and semester='$semester' and year='$year'");
        }
      }
    }
}else{
        echo "<script>alert('sum of department can't be much with total student');</script>";
      echo "<script type='text/javascript'>document.location='placement.php';</script>";
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
<body><div style="display: block;">
  <div style="width: 93%; height: 70px; border-radius: 10px; background: white; margin-left: 5%; margin-top: 30px; padding: 10px;">
            <p>Make Placement</p><br>
            <h2 style="color: #524d7d; font-size: 16px;">Dashboard > Placement Module</h2>
        </div>
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
    <div style="overflow-y: scroll;">
    <table  class="table">
      <thead>
      <tr>
        <th>R/N</th>
        <th>Student ID</th>
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
          $dddd=$_POST['number'];
        }else{
          $dddd=5;
        }
        $n1=1;
        $n2=1;
        $count=mysqli_num_rows($select);
        if($count>0){
          while($row=mysqli_fetch_assoc($select) and $n2<=$dddd){
            $enterance=$row['enterance']*20;
            echo "
         <tr>
        <td>".$n1."</td>
        <td>".$row['student_id']."</td>
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
        <td><a href='edit_student.php?id=".$row['ID']."' target='iframe'><div style='display: flex;'><i class='fa-solid fa-edit' ></i><p style='margin-left: 3px;'>Edit</p></div></a></td>
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
        <td colspan="8" bgcolor="gray" style="height: fit-content;">
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
    </table></div>
   </div></div>
</body>
</html>