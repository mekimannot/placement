<?php 
   
   include('../conn.php');
   include('../session.php');
   $select1=mysqli_query($conn,"select *from department");
   $count=mysqli_num_rows($select1);
/*

            <div class="sub-menu-1">
               <ul>
                  <?php
                  if($count>0){
                     while($row=mysqli_fetch_assoc($select1)){
                        echo "
                  <li><a href='med.php?dsname=".$row['dsname']."' target='frame'>".$row['dname']."</a></li>
                        ";
                     }
                  } 
                  ?>
               </ul>
            </div>*/
            if(!isset($_SERVER['HTTP_REFERER'])){
   header('../403.php');
   exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Placement
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/3012035e7a.js" crossorigin="anonymous"></script>
      <link href="../fontawesome/css/fontawesome.css" rel="stylesheet">
      <link href="../fontawesome/css/brands.css" rel="stylesheet">
      <link href="../fontawesome/css/solid.css" rel="stylesheet">
      <style type="text/css">
         #ang{
            color: white;
            margin-right: 5px;
         }#photo{
            margin-right: -16px;
         }
      </style>
</head>
<body>
	<div class="r1">
      <div class="nav_bar"  id="navLinks">
         <div class="header"><img src="../images/w.jpg" width="30px" height="30px" id="im"><i class='fa-solid fa-xmark' id="x"  onclick="hideMenu()" >
            </i></div>
            <div class="c5">
         <ul>
         <li><a href="add_student.php" target="frame" onclick="hideMenu()">Add Student</a></li>
         <li><a href="stream_selector.php" target="frame" onclick="hideMenu()">student list</a></li>
         <li><a href="add_dep.php" target="frame" onclick="hideMenu()">Add Department</a></li>
         <li><a href="region.php" target="frame" onclick="hideMenu()">Add Region</a></li><li><a>Department List</a>

            <div class="sub-menu-3">
               <ul>
                  <?php
                  if($count>0){
                     while($row=mysqli_fetch_assoc($select1)){
                        echo "
                  <li><a href='med.php?dsname=".$row['dsname']."' target='frame'  onclick='hideMenu()'>".$row['dname']."</a></li>
                        ";
                     }
                  } 
                  ?>
               </ul>
            </div>
      </ul>
   </div>
      </div>
		<div class="c2">
			<div class="c4">
			<img src="../images/w.jpg" width="30px" height="30px" id="im">
       <ul>
       	<li><a href="add_student.php" target="frame">Add Student</a></li>
       	<li><a href="stream_selector.php" target="frame">student list</a></li>
         <li><a href="add_dep.php" target="frame">Add Department</a></li>
         <li><a href="region.php" target="frame">Add Region</a></li>
         <li><a href="">Department List</a>
            <div class="sub-menu-2">
               <ul>
                  <?php
                  $select=mysqli_query($conn,"select *from department");
                  $counts=mysqli_num_rows($select);
                  if($counts>0){
                     while($r=mysqli_fetch_assoc($select)){
                        echo "
                  <li><a href='med.php?dsname=".$r['dsname']."' target='frame' onclick='hideMenu()'>".$r['dname']."</a></li>
                        ";
                     }
                  } 
                  ?>
               </ul>
            </div></li>
            <li><img src="../images/no.jpg" class="profile" id="photo"></li>
            <li href=""><a>Meki Ermena</a>
            <i class='fa-solid fa-angle-right' id="an_right" style="color: white;" >
            </i>
            <div class="sub-menu-2">
               <ul>
                  <li><i class="fa-solid fa-key" id="ang"></i><a href="change_password.php" target="frame" style="color: white;">Change Passward</a></li>
                  <li><i class="fa-solid fa-user-circle" id="ang"></i><a href="password.php" target="frame" style="color: white;">View Profile</a></li>
                  <li><i class="fa-solid fa-lock" id="ang"></i><a href="../logout.php" style="color: white;">Logout</a></li>
               </ul>
            </div></li>
       </ul>
     </div>
     <div class="c6">
            <i class="fa-solid fa-bars" id="menu" onclick="showMenu()"></i>
           <div class="right_angle"> <li><img src="../images/no.jpg" class="profile"></li>
            <li class="meki"><a>Meki Ermena</a>
            <i class='fa-solid fa-angle-right' id="an_right" >
            </i>
            <div class="sub-menu-2">
               <ul>
                  <li><i class="fa-solid fa-key" id="ang"></i><a href="password.php" target="frame" style="color: white;">Change Passward</a></li>
                  <li><i class="fa-solid fa-user-circle" id="ang"></i><a href="password.php" target="frame" style="color: white;">View Profile</a></li>
                  <li><i class="fa-solid fa-lock" id="ang"></i><a href="../logout.php" style="color: white;">Logout</a></li>
               </ul>
            </div></li></div></div>
		<iframe src="dashboard.php" name="frame" class="frame"></iframe>
      </div>
	</div>

  <script type="text/Javascript">

   var navLinks = document.getElementById("navLinks");
   function showMenu(){
      navLinks.style.left="0px";
   }
   function hideMenu(){
      navLinks.style.left ="-300px";
   }
  </script>
</body>
</html>