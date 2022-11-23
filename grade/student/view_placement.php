<?php
   include('../conn.php');
   include('../session.php');
   $select=mysqli_query($conn,"select *from student where ID='$session_id'");
   $row=mysqli_fetch_assoc($select);   
   $st_id=$row['student_id'];
   $select3=mysqli_query($conn,"select *from student_choice where student_id='$st_id'");
   $r3=mysqli_fetch_assoc($select3); 
   $dep=$row['department'];
   $stream=$row['stream'];
   $semester=$row['semester'];
   //if($dep==""){
   $select1=mysqli_query($conn,"select *from department where stream='$stream' and semester='$semester'");
   $counts=mysqli_num_rows($select1);
   
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
  	<div class="c1" style="height: fit-content; padding-bottom: 30px;"><h2>Department Placement</h2><hr>
        <div style="margin-left: 20px; margin-top: 30px; margin-bottom: 30px; display: block;">
            <div style="display: flex;"><h1>Full Name: </h1><p style="padding-top: 10px; margin-left: 30px;"><?php echo $row['fname']; echo " "; echo $row['mname']; echo " "; echo $row['lname']; ?></p></div><br>
            <div style="display: flex;"><h1>Student ID: </h1><p style="padding-top: 10px; margin-left: 30px;"><?php echo $row['student_id'];?></p></div><br>
           <div style="display: flex;"> <h1>Program: </h1>
            <p style="padding-top: 10px; margin-left: 50px;"><?php $dep=$row['department']; $select2=mysqli_query($conn,"select *from department where dsname='$dep'"); $r1=mysqli_fetch_assoc($select2); if($dep==""){
                echo "Waiting For Placement";
            }else{
                echo $r1['dname'];
            } ?></p></div>
        </div>
        <p style="margin-left: 20px; padding-top: 50px; font-weight: bold;">Department Choice Order</p>
       <div class="two" style="overflow-x: scroll;">
                <table border="1" class="t">
                    <tr>
                        <?php for($j=1;$j<=$counts;$j++){
                            $c="c$j";
                            $c1=$r3[$c];
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
                            $c1=$r3[$c];
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
    </body>
</html>