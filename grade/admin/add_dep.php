<?php
   include('../conn.php');
   include('../session.php');
        $select=mysqli_query($conn,"select *from department");
  if(isset($_POST['sub'])){
    $dname=$_POST['dname'];
    $dsname=$_POST['dsname'];
    $stream=$_POST['stream'];
    $semester=$_POST['semester'];
        $count=mysqli_num_rows($select);
    $insert=mysqli_query($conn,"insert into department(dname,dsname,stream,semester) values('$dname','$dsname','$stream','$semester')");
    if($insert){
        $count++;
        $d1="c$count";
        $added=mysqli_query($conn,"alter table student ADD $d1 VARCHAR(100)");
        $add=mysqli_query($conn,"alter table student_choice ADD $d1 VARCHAR(100)");
        echo "<script type='text/javascript'>alert('seccussfuly Inserted');</script>";
        echo "<script type='text/javascript'>document.location='add_dep.php';</script>";
        
    }else{
        echo "<script>alert('something wrong');</script>";
        echo "<script type='text/javascript'>document.location='add_dep.php';</script>";
    }
  }
  if(isset($_GET['delete_id'])){
    $delete_id=$_GET['delete_id'];
    $delete=mysqli_query($conn,"delete from department where ID='$delete_id'");
    if($delete){
        echo "<script type='text/javascript'>alert('seccussfuly Deleted');</script>";
        echo "<script type='text/javascript'>document.location='add_dep.php';</script>";
        
    }else{
        echo "<script>alert('something wrong');</script>";
        echo "<script type='text/javascript'>document.location='add_dep.php';</script>";
    }
  }$num=0;
  if(isset($_GET['update_id'])){
    $update_id=$_GET['update_id'];
    $select1=mysqli_query($conn,"select *from department where ID='$update_id'");
    $num=mysqli_num_rows($select1);
    $r1=mysqli_fetch_assoc($select1);
  }if(isset($_POST['update'])){
    $dname=$_POST['dname'];
    $dsname=$_POST['dsname'];
    $stream=$_POST['stream'];
    $semester=$_POST['semester'];
    $update=mysqli_query($conn,"update department set dname='$dname',dsname='$dsname',stream='$stream',semester='$semester' where ID='$update_id'");
    if($update){
        echo "<script type='text/javascript'>alert('seccussfuly Updated');</script>";
        echo "<script type='text/javascript'>document.location='add_dep.php';</script>";
        
    }else{
        echo "<script>alert('something wrong');</script>";
        echo "<script type='text/javascript'>document.location='add_dep.php';</script>";
    }

  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <script src="https://kit.fontawesome.com/3012035e7a.js" crossorigin="anonymous"></script>
      <link href="../fontawesome/css/fontawesome.css" rel="stylesheet">
      <link href="../fontawesome/css/brands.css" rel="stylesheet">
      <link href="../fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body><div style="display: block;">
    <div style="width: 90%; height: 70px; border-radius: 10px; background: white; margin-left: 5%; margin-top: 30px; padding: 10px;">
            <p>Add Department</p><br>
            <h2 style="color: #524d7d; font-size: 16px;">Dashboard > Department Module</h2>
        </div>
   <div class="add1">
       <div class="add2">
        <form action="" method="post">
                <div class="two" style=" margin-top: 50px;">
               <label for="Fname">Department Name</label>
               <input type="text" name="dname" value="<?php if($num>0){
                 echo $r1['dname'];
               } ?>" class="input" required>
               </div><div class="two">
               <label for="Fname">Department Shor Name</label>
               <input type="text" name="dsname" value="<?php if($num>0){
                 echo $r1['dsname'];
               } ?>" class="input" required>
               </div><div class="two">
               <label for="Fname">Stream</label>
               <select class="input" name="stream" required>
                   <option value="<?php if($num>0){
                 echo $r1['stream'];
               } ?>"><?php if($num>0){
                 echo $r1['stream'];
               }else{ ?>Select Stream<?php } ?></option>
                   <option value="natural science">Natural Science</option>
                   <option value="social science">Social Science</option>
               </select>
               </div><div class="two">
               <label for="Fname">Semester</label>
               <select class="input" name="semester" required>
                   <option value="<?php if($num>0){
                 echo $r1['semester'];
               } ?>"><?php if($num>0){
                 echo $r1['semester'];
               }else{ ?>Select Semester<?php } ?></option>
                   <option value="1">I</option>
                   <option value="2">II</option>
               </select>
               </div>
               <div class="two" style="margin-left: 7%;"><input type="submit" <?php if($num>0){?>
                    name="update"
                <?php  }else{?>
                  name="sub"
               <?php } ?> class="sub" value="<?php if($num>0){?> update Department<?php } else{?>Add Department<?php }?>" style="margin-left: 30%; background: green; margin-top: 40px; color: white;"> </div></form>
       </div>
       <div class="add3">
        <table  class="table">
        <thead>
        <tr>
            <th>R/N</th>
            <th>Department Name</th>
            <th>Department Short Name</th>
            <th>Stream</th>
            <th>Semester</th>
            <th>Action</th>
        </tr></thead>
        <tbody>
            <?php
               $counts=mysqli_num_rows($select);
               $rn=1;
               if($counts>0){
                while($row=mysqli_fetch_assoc($select)){
                    echo "
        <tr>
            <td>".$rn."</td>
            <td>".$row['dname']."</td>
            <td>".$row['dsname']."</td>
            <td>".$row['stream']."</td>
            <td>".$row['semester']."</td>
            <td><a href='add_dep.php?update_id=".$row['ID']."'><i class='fa-solid fa-edit' ></i></a><a href='add_dep.php?delete_id=".$row['ID']."'><i class='fa-solid fa-trash' style='color: red; margin-left: 20px;'></i></a></td>
        </tr>
                    ";
                    $rn++;
                }
               }
            ?>
    </tbody>
    </table>
        </div>
   </div></div>
</body>
</html>