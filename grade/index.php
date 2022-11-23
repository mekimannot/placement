<?php

  session_start();
  $conn=mysqli_connect('localhost','root','','placement');
  $error=0;
    if(isset($_POST['submit'])){
        $user_id=$_POST['user_id'];
        $password=md5($_POST['password']);
        $santazed_id=mysqli_real_escape_string($conn,$user_id);
        $santazed_password=mysqli_real_escape_string($conn,$password);
    $select1=mysqli_query($conn,"select *from staff where user_id='$santazed_id' AND password='$santazed_password'");
    $select2=mysqli_query($conn,"select *from student where student_id='$santazed_id' AND password='$santazed_password'");
    $counts1=mysqli_num_rows($select1);
    $counts2=mysqli_num_rows($select2);

    if($counts2>0){
        while($row=mysqli_fetch_assoc($select2)){
       $_SESSION['id']=$row['ID'];
            $status=$row['status'];
            if($status==1){
        echo "<script type='text/javascript'> document.location = 'student/student_index.php'; </script>";
            }else{
        echo "<script type='text/javascript'> document.location = 'student/change_password.php'; </script>";
            }
             
        }
    }else{
        $error=1;
    }
    if($counts1>0){
        while($row=mysqli_fetch_assoc($select1)){
       $_SESSION['id']=$row['ID'];
                echo "<script type='text/javascript'> document.location = 'admin/new_index.php'; </script>"; 
        }
    }else{
        $error=1;
    }
} 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Management</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <style>
        .box{
            padding: 20px;
        }#txt{
            background: white;
            color: black;
        }
    </style>
</head>

<body>
    <div class="contain">
    <form action="" method="post"> 
        <div class="h">
        <div class="both">
        <img class="img" src="images/w.jpg" alt="Werabe" height="50px" width="80px"><h2>Werabe University</h2></div>
        </div><div class="row1"> 
        <div class="box">
        <p>Welcome to Student Placement</p>
        <?php if($error==0){}else{ ?>
        <p style="color: white; background: darkred; margin-top: -30px; padding: 10px 20px;  border: 1px solid black;">Incorrect User Id or Password</p><?php } ?>
            <input title="Enter your user id" type="text" name="user_id" placeholder="User ID" class="form-control" required><br>
            <input title="Enter your password"  type="password" name="password" placeholder="**********" class="form-control" required><br>
            <a href="" class="layer">Forgot Password</a><br>
            <input type="submit" name="submit" value="Sign In" class="btn btn-primary">
        </div>
     </div>
   </div>
  </form>
</div>
</body>
</html>