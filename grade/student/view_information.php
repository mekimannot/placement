<?php
   include('../conn.php');
   include('../session.php');
   $select=mysqli_query($conn,"select *from student where ID='$session_id'");
   $row=mysqli_fetch_assoc($select);
   
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>student placement</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        @media(max-width: 700px){
            .container_info{
              display: block;
            }
              .list_contain{
                display: flex;
              }
        }
              .list_contain{
                display: flex;
              }
    </style>
</head>
<body>
  	<div class="c1"><h2>Student Information</h2><hr>
           <div class="container_inf">
            <div class="left_contai">
               <div class="list_contain">
                   <h3>First Name: </h3>
                   <p style="margin-left: 30px;"><?php echo $row['fname']; ?></p>
               </div>
               <div class="list_contain">
                   <h3>Middle Name:</h3>
                   <p style="margin-left: 10px;"><?php echo $row['mname']; ?></p>
               </div>
               <div class="list_contain">
                   <h3>Last Name:</h3>
                   <p style="margin-left: 33px;"><?php echo $row['lname']; ?></p>
               </div>
               <div class="list_contain" >
                   <h3>Disability:</h3>
                   <p style="margin-left: 40px;"><?php echo $row['disability']; ?></p>
               </div>
               <div class="list_contain">
                   <h3>Natianality:</h3>
                   <p style="margin-left: 27px;">Ethiopia</p>
               </div>
               <div class="list_contain">
                   <h3>Region:</h3>
                   <p style="margin-left: 60px;"><?php echo $row['region']; ?></p>
               </div>
               <div class="list_contain">
                   <h3>Grade:</h3>
                   <p style="margin-left: 70px;"><?php echo $row['grade']; ?></p>
               </div>
           </div>
            <div class="left_contai">
               <div class="list_contain">
                   <h3>Enterance</h3>
                   <p style="margin-left: 10px;"><?php echo $row['enterance']; ?></p>
               </div>
               <div class="list_contain" style="margin-right: 80px;">
                   <h3>Semester</h3>
                   <p style="margin-left: 20px;"><?php echo $row['semester']; ?></p>
               </div>
               <div class="list_contain">
                   <h3>Gender:</h3>
                   <p style="margin-left: 30px;"><?php echo $row['gender']; ?></p>
               </div>
               <div class="list_contain">
                   <h3>COC:</h3>
                   <p style="margin-left: 52px;"><?php echo $row['coc']; ?></p>
               </div>
               <div class="list_contain">
                   <h3>Total</h3>
                   <p style="margin-left: 55px;"><?php echo $row['total']; ?></p>
               </div>
               <div class="list_contain">
                   <h3>Stream:</h3>
                   <p style="margin-left: 30px;"><?php echo $row['stream']; ?></p>
               </div>
           </div>
           </div>
       </div>
    </body>
</html>