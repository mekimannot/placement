<?php
  include('../session.php');
  include('../conn.php');
  if(isset($_POST['change_password'])){
  	$current_password=$_POST['current_password'];
  	$new_password=$_POST['new_password'];
  	$confirm_password=$_POST['confirm_password'];
	$select = mysqli_query($conn,"select * from student where  ID='$session_id' AND password='$current_password' ");
	$row =mysqli_fetch_assoc($select);
	if($row>0){
	if($confirm_password==$new_password)
	{
    $result = mysqli_query($conn,"update student set  password='$new_password',status='1' where ID='$session_id'         
		")or die(mysqli_error());
    if ($result) {
     	echo "<script>alert('Your Password Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'password.php'; </script>";
	} else{
	  die(mysqli_error());
   }
}
else{
	echo "<script>alert('new password and confirm password are not match');</script>";
	echo "<script type='text/javascript'> document.location = 'password.php'; </script>";
}
}
else{
	echo "<script>alert('current password is incorrect');</script>";
	echo "<script type='text/javascript'> document.location = 'password.php'; </script>";
}


}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container"> 
  	<form action="" method="post">
  		<div class="input_container">
  			<h2>Change Passaword</h2><hr>
  			<div class="label_container">
  			<label>Current Password</label>
  			<input type="password" name="current_password" class="input" required>
  		</div>
  			<div class="label_container">
  			<label>New Password</label>
  			<input type="password" name="new_password" class="input" required>
  		</div>
  			<div class="label_container">
  			<label>Confirm Password</label>
  			<input type="password" name="confirm_password" class="input" required>
  		</div>
  			<div class="label_container">
  			<input type="submit" name="change_password" value="change password" class="change_password" style="background: #3c8dbc; border: 1px solid #3c8dbc;">
  		</div>
  	</div></form>
  </div>
</body>
</html>