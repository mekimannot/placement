<?php
   include('../conn.php');
   include('../session.php');
  if(isset($_GET['id'])){
  	$id=$_GET['id'];
  	$select=mysqli_query($conn,"select *from student where ID='$id'");
  	$row=mysqli_fetch_assoc($select);
  }$select1=mysqli_query($conn,"select *from region");
  if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $student_id=$_POST['student_id'];
    $gpa=$_POST['gpa'];
    $gender=$_POST['gender'];
    $stream=$_POST['stream'];
    $semester=$_POST['semester'];
    $year=$_POST['year'];
    $enterance=$_POST['enterance'];
    $region=$_POST['reg'];
    $coc=$_POST['coc'];
    $tran1=$_POST['tran1'];
    $tran2=$_POST['tran2'];
    $disability=$_POST['disability'];
   // $password="aaa$lname$student_id";
    $e1=$enterance*20;
    $enterance=$e1/700;
    $t1=$gpa*50;
    $t2=$t1/4;
    $total=$t2+$coc+$enterance;
    if($gender=="female"){
        $total=$total+5;
    }if($disability=="yes"){
        $total=$total+5;
    }
    while($fetch=mysqli_fetch_assoc($select1)){
        $region_name=$fetch['region_name'];
        if($region==$region_name){
            if($fetch['status']=="Affirmative"){
        $total=$total+5;
    }
        }
    }
    $update=mysqli_query($conn,"update student set student_id='$student_id',fname='$fname',mname='$mname',lname='$lname',grade='$gpa',region='$region',gender='$gender',stream='$stream',year='$year',semester='$semester',enterance='$enterance',coc='$coc',disability='$disability',total='$total',transcript1='$tran1',transcript2='$tran2' where ID='$id'");
    if($update){
        echo "<script type='text/javascript'>alert('seccussfuly updated');</script>";
        echo "<script type='text/javascript'>document.location='student_placement.php';</script>";
        
    }else{
        echo "<script>alert('something wrong');</script>";
        echo "<script type='text/javascript'>document.location='student_placement.php';</script>";
    }
  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/3012035e7a.js" crossorigin="anonymous"></script>
      <link href="../fontawesome/css/fontawesome.css" rel="stylesheet">
      <link href="../fontawesome/css/brands.css" rel="stylesheet">
      <link href="../fontawesome/css/solid.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../bootstrap.css">
      <style type="text/css">
          .row{
            margin-top: 20px;
          }.doc2{
            padding: 20px;
          }.all1{
            margin-top: 10px;
          }.btn{
            margin-top: 20px;
            margin-left: 40%;
          }
      </style>
</head>
<body>
   <div class="doctor">
    <div class="doc2">
        <h2>Student Form</h2>
        <hr>
        <form action="" method="post">
            <div class="all1"> 
           <div class="row"><div class="col-md-4">
                <div class="form-group">
               <label for="Fname">First Name</label>
               <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>" required>
               </div></div><div class="col-md-4"><div class="form-group">
               <label for="Fname">Middle Name</label>
               <input type="text" name="mname" class="form-control" value="<?php echo $row['mname']; ?>" required>
               </div></div><div class="col-md-4"><div class="form-group">
               <label for="Fname">Last Name</label>
               <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>" required>
               </div></div></div>
               <div class="row"><div class="col-md-4"><div class="form-group">
               <label for="phone">Student ID</label>
               <input type="text" name="student_id" value="<?php echo $row['student_id']; ?>" class="form-control" required>
               </div></div><div class="col-md-4"><div class="form-group">
               <label for="profile">GPA</label>
               <input type="text" name="gpa" class="form-control" value="<?php echo $row['grade']; ?>" required></div></div><div class="col-md-4"><div class="form-group">
               <label for="depart">Gender</label>
               <select name="gender" id="depart" class="custom-select form-control" required>
                <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
               </select>
               </div></div></div><div class="row"><div class="col-md-4"> <div class="form-group">
               <label for="depart">Enterance</label>
               <input type="text" name="enterance" value="<?php $enterance=$row['enterance']*20; echo $enterance; ?>" class="form-control" required>
               </div></div><div class="col-md-4"><div class="form-group">
               <label for="profile">Region</label>
               <select name="reg" id="depart" class="custom-select form-control" required>
                <option value="<?php echo $row['region']; ?>"><?php echo $row['region']; ?></option>
                <?php

            $s1=mysqli_query($conn,"select *from region");
                   $count=mysqli_num_rows($s1);
                   if($count>0){
                      while($fetch=mysqli_fetch_assoc($s1)){
                        echo "
                <option value='".$fetch['region_name']."'>".$fetch['region_name']."</option>

                        ";
                      }
                   }
                ?>
               </select></div></div><div class="col-md-4"><div class="form-group">
               <label for="depart">COC</label>
               <input type="text" name="coc" value="<?php echo $row['coc']; ?>" class="form-control" required>
               </div></div></div>
               <div class="row"><div class="col-md-4">
                <div class="form-group">
               <label for="depart">Disability</label>
               <select name="disability" id="depart" class="custom-select form-control" required>
                <option value="<?php echo $row['disability']; ?>"><?php echo $row['disability']; ?></option>
                <option value="yes">Yes</option>
                <option value="no">no</option>
               </select>
               </div></div><div class="col-md-4"> 
                <div class="form-group">
               <label for="depart">Stream</label>
               <select name="stream" id="depart" class="custom-select form-control" required>
                <option value="<?php echo $row['stream']; ?>"><?php echo $row['stream']; ?></option>
                <option value="natural science">natural science</option>
                <option value="social science">social science</option>
               </select>
               </div></div><div class="col-md-4"><div class="form-group">
               <label for="depart">Year</label>
               <input type="number" name="year" class="form-control" value="<?php echo $row['year']; ?>" required>
               </select>
               </div></div>
           </div>
           <div class="row"><div class="col-md-4">
                <div class="form-group">
               <label for="depart">Semester</label>
               <select name="semester" id="depart" class="custom-select form-control"  required>
                <option value="<?php echo $row['semester'] ?>"><?php echo $row['semester'] ?></option>
                <option value="I">1</option>
                <option value="II">2</option>
               </select>
               </div></div><div class="col-md-4">
                <div class="form-group">
               <label for="depart">Transcript 11-12</label>
               <input type="text" name="tran1" class="form-control" value="<?php echo $row['transcript1']; ?>" required>
               </div></div><div class="col-md-4">
                <div class="form-group">
               <label for="depart">Transript 9-10</label>
               <input type="text" name="tran2" class="form-control" value="<?php echo $row['transcript2']; ?>" required>
               </div></div>
         </div><div ></div><div class="form-group">
             <input type="submit" name="submit" class="btn btn-primary" value="Update Student" style="margin-left: 30px;">
         </div>
               
              
            </div>
        </form>
    </div>
   </div>
</body>
</html>