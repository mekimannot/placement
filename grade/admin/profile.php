<?php
   include('../conn.php');
   include('../session.php');
   $select=mysqli_query($conn,"select *from staff where ID='$session_id'");
   $row=mysqli_fetch_assoc($select);
   if(isset($_POST['submit'])){
   	$fname=$_POST['fname'];
   	$mname=$_POST['mname'];
   	$lname=$_POST['lname'];
   	$user_id=$_POST['user_id'];
   	$email=$_POST['email'];
   	$gender=$_POST['gender'];
   	$update=mysqli_query($conn,"update staff set user_id='$user_id',fname='$fname',mname='$mname',lname='$lname',email='$email',gender='$gender' where ID='$session_id'");
   	if($update){
        echo "<script type='text/javascript'>alert('seccussfuly updated');</script>";
        echo "<script type='text/javascript'>document.location='profile.php';</script>";
        
    }else{
        echo "<script>alert('something wrong');</script>";
        echo "<script type='text/javascript'>document.location='profile.php';</script>";
    }
   }
   ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Werabe University</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.profile_box{
			width: 90%;
			height: 70vh;
			margin-top: 50px;
			margin-left: 5%;
			background: white;
			border-radius: 10px;
		}
	</style>
</head>
<body>
  <div class="doc2">
        <h2>Profile Form</h2>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="all1"> 
           <div class="doc3">
                <div class="two">
               <label for="Fname">First Name</label>
               <input type="text" name="fname" class="input" value="<?php echo $row['fname']; ?>" required>
               </div><div class="two">
               <label for="Fname">Middle Name</label>
               <input type="text" name="mname" class="input" value="<?php echo $row['mname']; ?>" required>
               </div><div class="two">
               <label for="Fname">Last Name</label>
               <input type="text" name="lname" value="<?php echo $row['lname']; ?>" class="input" required>
               </div></div>
               <div class="doc3"><div class="two">
               <label for="phone">User ID</label>
               <input type="text" name="user_id" value="<?php echo $row['user_id']; ?>" class="input" required>
               </div><div class="two">
               <label for="profile">Email</label>
               <input type="email" name="email" value="<?php echo $row['email']; ?>" class="input" required></div><div class="two">
               <label for="depart">Gender</label>
               <select name="gender" id="depart" class="file" required>
                <option  value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
               </select>
               </div></div>
               
         </div><div class="doc3">
               <div class="two" style="margin-left: 25%;">
             <input type="submit" name="submit" class="submit" value="Update" style="border: 1px solid skyblue;">
         </div></div></form>
              
            </div>
   </div>
    </div>
</body>
</html>