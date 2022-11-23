<?php
  include('../session.php');
  include('../conn.php');
  if(isset($_POST['change_password'])){
  	$current_password=md5($_POST['current_password']);
  	$new_password=$_POST['new_password'];
  	$confirm_password=$_POST['confirm_password'];
	$select = mysqli_query($conn,"select * from staff where  ID='$session_id' AND password='$current_password' ");
	$row =mysqli_fetch_assoc($select);
	if($row>0){
	if($confirm_password==$new_password)
	{
		$new=md5($new_password);
    $result = mysqli_query($conn,"update staff set  password='$new' where ID='$session_id'         
		");
     	echo "<script>alert('Your Password Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'change_password.php'; </script>";
}
else{
	echo "<script>alert('new password and confirm password are not match');</script>";
	echo "<script type='text/javascript'> document.location = 'change_password.php'; </script>";
}
}
else{
	echo "<script>alert('current password is incorrect');</script>";
	echo "<script type='text/javascript'> document.location = 'change_password.php'; </script>";
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
	<style type="text/css">
		.container{
			width: 400px;
			height: 400px;
			background: white;
			border-radius: 10px;
			margin-left: 37%;
			padding: 20px;
			margin-top: 50px;
		}.label_container{
			margin-top: 20px;
			margin-left: 25px;
		}.change_password{
			padding: 10px 20px;
			margin-left: 25%;
			border-radius: 10px;
      margin-top: 20px;
      border: 1px;
      background: #3c8dbc;
      color: white;
		}.change_password:hover{
			background: #367fa9;
		}@media(max-width: 1000px){
        .container{
			margin-left: 2%;
			width: 350px;
		} 
    }
	</style>
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
  			<input type="submit" name="change_password" value="change password" class="change_password">
  		</div>
  	</div></form>
  </div>
</body>
</html>