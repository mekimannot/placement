<?php
   include('../conn.php');
   include('../session.php');
   include('csv.php');
   $csv=new csv();
   if(isset($_POST['csv'])){
    $csv->import($_FILES['file']['tmp_name']);
   }
   $select=mysqli_query($conn,"select *from region");
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
    $region=$_POST['region'];
    $coc=$_POST['coc'];
    $disability=$_POST['disability'];
    $password=md5("wru$lname$student_id");
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
    while($fetch=mysqli_fetch_assoc($select)){
        $region_name=$fetch['region_name'];
        if($region==$region_name){
            if($fetch['status']=="Affirmative"){
        $total=$total+5;
    }
        }
    }
    $insert=mysqli_query($conn,"INSERT INTO student(student_id,password,fname,mname,lname,grade,region,gender,stream,year,semester,enterance,coc,disability,total) VALUES('$student_id','$password','$fname','$mname','$lname','$gpa','$region','$gender','$stream','$year','$semester','$enterance','$coc','$disability','$total')");
    if($insert){
        $in=mysqli_query($conn,"insert into student_choice(student_id) values('$student_id')");
        echo "<script type='text/javascript'>alert('seccussfuly Inserted');</script>";
        echo "<script type='text/javascript'>document.location='add_student.php';</script>";
        
    }else{
        echo "<script>alert('something wrong');</script>";
        echo "<script type='text/javascript'>document.location='add_student.php';</script>";
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
    <link rel="stylesheet" type="text/css" href="../bootstrap.css">
    <style type="text/css">
        body{
            background: #ecf0f4;
        }.doc2{
            padding: 20px;
        }.row{
            margin-bottom: 10px;
        }.all1{
            padding-top: 10px;
        }.btn{
            margin-top: 23px;
            margin-left: 30%;
        }.import{
            margin-top: 23px;
            margin-left: 30%;
        }.bot{
            margin-top: 20px;
        }
    </style>
</head>
<body onclick="bb()" style="overflow-x: hidden;">
   <div class="doctor">

        <div style="width: 93%; height: 80px; border-radius: 10px; background: white; margin-left: 5%; margin-top: 30px; padding: 10px; display: block;">
            <p>Add Student</p>
            <h2 style="color: #524d7d; font-size: 16px;">Dashboard > Student Module</h2>
        </div>
    <div class="doc2">
        <h2>Student Form</h2>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="all1"> 
           <div class="row"><div class="col-md-4">
                <div class="for-group">
               <label for="Fname">First Name</label>
               <input type="text" name="fname" class="form-control" required>
               </div></div><div class="col-md-4"><div class="form-group">
               <label for="Fname">Middle Name</label>
               <input type="text" name="mname" class="form-control" required>
               </div></div><div class="col-md-4"><div class="form-group">
               <label for="Fname">Last Name</label>
               <input type="text" name="lname" class="form-control" required>
               </div></div></div>
               <div class="row"><div class="col-md-4"><div class="form-group">
               <label for="phone">Student ID</label>
               <input type="text" name="student_id" class="form-control" required>
               </div></div><div class="col-md-4"><div class="form-group">
               <label for="profile">GPA</label>
               <input type="text" name="gpa" class="form-control" required></div></div><div class="col-md-4"><div class="form-group">
               <label for="depart">Gender</label>
               <select name="gender" id="depart" class="custom-select form-control" required>
                <option value="">select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
               </select>
               </div></div></div><div class="row"><div class="col-md-4"><div class="form-group">
               <label for="depart">Enterance</label>
               <input type="text" name="enterance" class="form-control" required>
               </div></div><div class="col-md-4"><div class="form-group">
               <label for="region">Region</label>
               <select name="region" id="region" class="custom-select form-control" required>
                <option value="">Select Region</option>
                <?php
                   $count=mysqli_num_rows($select);
                   if($count>0){
                      while($row=mysqli_fetch_assoc($select)){
                        echo "
                <option value='".$row['region_name']."'>".$row['region_name']."</option>

                        ";
                      }
                   }
                ?>
               </select></div></div><div class="col-md-4"><div class="form-group">
               <label for="depart">COC</label>
               <input type="text" name="coc" class="form-control" required>
               </div></div></div>
               <div class="row"><div class="col-md-4">
                <div class="form-group">
               <label for="depart">Disability</label>
               <select name="disability" id="depart" class="custom-select form-control" required>
                <option value="">select disiability</option>
                <option value="yes">Yes</option>
                <option value="no">no</option>
               </select>
               </div></div><div class="col-md-4">
                <div class="form-group">
               <label for="depart">Stream</label>
               <select name="stream" id="depart" class="file" required>
                <option value="">Select Stream</option>
                <option value="natural science">natural science</option>
                <option value="social science">social science</option>
               </select>
               </div></div><div class="col-md-4">
                <div class="form-group">
               <label for="depart">Semester</label>
               <select name="semester" id="depart" class="form-control" required>
                <option value="">Select Semester</option>
                <option value="I">1</option>
                <option value="II">2</option>
               </select>
               </div> </div>
        
         </div><div class="row">
                 <div class="col-md-4">
                <div class="form-group">
               <label for="depart">Year</label>
               <input type="number" name="year" class="form-control" required>
               </div></div><div class="col-md-2"> 
               <div class="form-group">
             <input type="submit" name="submit" class="btn btn-primary" value="Add Student" style="border: 1px solid skyblue;">
         </div></div></div></form>
        <form action="" method="post" enctype="multipart/form-data">OR(<div class="row bot"><div class="col-md-4">
            <div class="form-group">
                <label for="file">choice csv file</label>
            <input type="file" id="file" name="file" class="form-control"></div></div><div class="col-md-3">
            <div class="form-group"><input type="submit" name="csv" value="import" class="import"></div></div>
               </div>)</form>
              
            </div>
   </div>
    </div>
    </div>
</body>
</html>