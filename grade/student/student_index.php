<?php 
   
   include('../conn.php');
   include('../session.php');
   $select=mysqli_query($conn,"select *from student where ID='$session_id'");
   $select1=mysqli_query($conn,"select *from department");
   $count=mysqli_num_rows($select1);
   $row=mysqli_fetch_assoc($select);

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Werabe University
   </title>
   <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/3012035e7a.js" crossorigin="anonymous"></script>
      <link href="../fontawesome/css/fontawesome.css" rel="stylesheet">
      <link href="../fontawesome/css/brands.css" rel="stylesheet">
      <link href="../fontawesome/css/solid.css" rel="stylesheet">
      <style type="text/css">
         #ang{
            text-align: left;
            margin-left: -10px;
            margin-right: 5px;
         }.left_container{
            display: flex;
            justify-content: space-between;
         }#photo{
            border-radius: 20px;
            margin-top: 10px;
         }.nav_top_right{
            display: flex;
         }.nav_top_right a{
            margin-top: 4px;
            margin-left: 10px;
         }.profile_left{
         width: 170px;
         height: 130px;
         background: #031e23;
         position: absolute;
         margin-top: 40px;
         display: grid;
         border-radius: 10px;
         padding-top: 10px;
         padding-bottom: 20px;
      }.profile_left a{
         margin-top: 5px;
         color: white;
         font-size: 13px;
         text-decoration: none;
      }.profile_left a:hover{
         color: lightgray;
      }
      </style>
</head>
<body style="overflow: hidden;">
   <div class="contain" style="display: flex;">
      <div class="nav_bar" style="background: #031e23; color: white;"   id="navLinks">
         <div class="top"> 
         <img src="../images/w.jpg" width="60px" height="40px" id="im"><hr>
         <i class='fa-solid fa-xmark' id="xmark"  onclick="hideMenu()" style="color: white;" ></i>
      </div>
      <div class="bottom" style="color: white;">
       <ul >
         <li  onclick="hideMenu()"><i class='fa-solid fa-house' style="margin-right: 10px; margin-top: 20px;"></i><a href="dashboard.php" target="frame" style="color: white;">Home</a></li>
         <li  onclick="hideMenu()"><i class='fa-solid fa-dashboard' style="margin-right: 10px; margin-top: 20px;"></i><a href="select_dep.php" target="frame" style="color: white;">Select Department</a></li>
         <li  onclick="hideMenu()"><i class='fa fa-user-circle' style="margin-right: 10px; margin-top: 20px;"></i><a href="personal_detail.php" target="frame" style="color: white;">Personal Detail</a></li>
         <li onclick="hideMenu()" ><i class='fa-solid fa-archive' style="margin-right: 10px; margin-top: 20px; margin-bottom: 60px;"></i><a href="view_placement.php" target="frame" style="color: white;">View Placement</a></li>
       </ul> </div><hr>
      </div>
      <div class="all_container">
         <div class="left_container">
            <i class='fa-solid fa-bars'  onclick="showMenu()" ></i>
            <div class="nav_top_right">
               <img src="../images/no.jpg" class="profile" id="photo" width="30" height="30"></li>
               <a onclick="profile_left()"><?php echo $row['fname']; echo " "; echo $row['mname']; echo " "; echo $row['lname']; ?><i class='fa-solid fa-angle-right' id="an_right" style="color: black; font-size: 13px;" ></i></a>
             <div class="profile_left" id="profile" style="display: none;">
                <a onclick="bb()" href="personal_detail.php" target="frame"><i class='fa-solid fa-user' style=" margin-right: 10px;" ></i>Profile</a>
                <a onclick="bb()" href="change_password.php" target="frame"><i class='fa-solid fa-key' style="margin-right: 10px;" ></i>Reset Password</a>
                <a href="../logout.php"><i class='fa-solid fa-lock' style="margin-right: 10px;" ></i>Logout</a>
             </div>
            </div>
     </div>
      <iframe src="dashboard.php" name="frame" class="frame" style="background: #ecf0f4;"></iframe>
      </div>
   </div>

  <script type="text/Javascript">

         var state1=false;
   var navLinks = document.getElementById("navLinks");
   function showMenu(){
      navLinks.style.left="0";
   }
   function hideMenu(){
      navLinks.style.left ="-300px";
   } function profile_left(){
         state1=!state1;
         if(state1===true){
            document.getElementById("profile").style.display="grid"
         }else{            
            document.getElementById("profile").style.display="none"
         }
      }
  </script>
</body>
</html>