<?php 
   
   include('../conn.php');
   include('../session.php');
   $select1=mysqli_query($conn,"select *from department");
   $count=mysqli_num_rows($select1);
   $status=0;
   if(isset($_POST['year'])){
      $year_number=$_POST['year'];
      $status=1;
   }
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
   $select=mysqli_query($conn,"select *from staff where ID='$session_id'");
   $row=mysqli_fetch_assoc($select);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
   <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/3012035e7a.js" crossorigin="anonymous"></script>
      <link href="../fontawesome/css/fontawesome.css" rel="stylesheet">
      <link href="../fontawesome/css/brands.css" rel="stylesheet">
      <link href="../fontawesome/css/solid.css" rel="stylesheet">
   <style type="text/css">
      *{
         padding: 0;
         margin: 0;
         font-family: sans-serif;
      }.index_box{
         height: 50vh;
         width: 99.8%;
         background: lightgray;
         display: flex;
      }.nav_left{
         width: 300px;
         height: 99.7vh;
         background: #031e23;
      }#an_right{
         color: white;
      }.nav_right{
         display: block;
         width: 100%;
         height: 9.4vh;
         background: #ecf0f4;
      }.nav_top{
         height: 44px;
         width: 100%;
         background: #367fa9;
         display: flex;
         justify-content: space-between;
      }.iframe{
         height: 92.6vh;
         width: 99.2%;
         background: #ecf0f4 ;
      }#im{
         margin-left: 40%;
         margin-top: 10px;
      }.nav_all{
         margin-top: 30px;
         margin-left: 10px;
      }.nav_all ul li {
         margin-top: 35px;
         list-style: none;
      }.nav_all ul li a{
         text-decoration: none;
         color: white;
         font-size: 18px;
      }.nav_top_right{
         display: flex;
         margin-right: 20px;
         margin-top: 8px;
      }.nav_top_right a{
         padding-top: 5px;
         text-decoration: none;
         margin-left: 20px;
         color: white;
      }.nav_all ul li a:hover {
         color: lightgray;
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
         margin-top: 10px;
         color: white;
      }.profile_left a:hover{
         color: gray;
      }.ii{
         display: none;
      }@media(max-width: 1000px){
         .nav_left{
            display: none;
         }.nav_left{
        position: absolute;
        transition: 0.5s;
        z-index: 2;
        left: -300px;
        display: block;
    }.ii{
      display: block;
    }
      }
   </style>
</head>
<body style="overflow: hidden;">
   <a >
   <div class="index_box"  >
      <div class="nav_left" id="index_box" style="">
         <div style="display: flex">
         <img src="../images/w.jpg" width="30px" height="34px" id="im">
         <i class='fa-solid fa-arrow-left ii' onclick="hideMenu()" id="an_right" style="color: white; margin-left: 15%; margin-top: 14px;" ></i>
      </div><hr>
         <div class="nav_all">
         <ul>
            <li><i class='fa-solid fa-house' id="an_right" style=" margin-right: 10px;" ></i><a href="dashboard.php" target="iframe" onclick="hideMenu()">Home</a></li>
         <li><i class='fa-solid fa-user' id="an_right" style=" margin-right: 10px;" ></i><a href="add_student.php" target="iframe" onclick="hideMenu()">Add Student</a></li>
         <li><i class='fa-solid fa-dashboard' id="an_right" style=" margin-right: 10px;" ></i><a href="stream_selector.php" target="iframe" onclick="hideMenu()">make placement</a></li>
         <li><i class='fa-solid fa-book' id="an_right" style=" margin-right: 10px;" ></i><a href="add_dep.php" target="iframe" onclick="hideMenu()">Add Department</a></li>
         <li><i class='fa-solid fa-book' id="an_right" style=" margin-right: 10px;" ></i><a href="region.php" target="iframe" onclick="hideMenu()">Add Region</a></li>
         <li><i class='fa-solid fa-list' id="an_right" style=" margin-right: 10px;" ></i><a id="get" onclick="g()">Department List<i class='fa-solid fa-angle-down' id="an_rightt" style=" margin-left: 30px; left: 170px; position: absolute; top: 55%;"></i><i class='fa-solid fa-angle-up' id="an_down" style="color: white; margin-left: 30px; display: none; left: 170px; position: absolute; top: 55%;" ></i></a>
            <div class="sub-menu-2" id="sub-menu-2"  style="background: #031e23; width: 200px; max-height: 250px; margin-left: 30px;  overflow-y: scroll; " >
               
               <ul>
                  <?php
                  $select=mysqli_query($conn,"select *from department");
                  $counts=mysqli_num_rows($select);
                  if($counts>0){
                     while($r=mysqli_fetch_assoc($select)){
                        echo "
                  <li style='border-bottom: 1px dashed white; padding-bottom: 5px; margin-top: 25px;'><i class='fa-solid fa-minus' id='an_right' style='color: white; margin-right: 10px;' ></i><a href='select_year.php?dsname=".$r['dsname']."' target='iframe' onclick='hideMenu()'>".$r['dname']."</a></li>
                        ";
                     }
                  } 
                  ?>
               </ul>
            </div>
      </ul></div>
      </div>
      <div class="nav_right">
         <div class="nav_top">
            <i class='fa-solid fa-bars' id="an_right" style="color: white; margin-left: 20px; margin-top: 13px;" onclick="showmenu()" ></i>
            <div class="nav_top_right">
               <img src="../images/no.jpg" class="profile" id="photo"></li>
               <a onclick="profile_left()"><?php echo $row['fname']; echo " "; echo $row['mname']; ?><i class='fa-solid fa-angle-right' id="an_right" style="color: white; font-size: 13px;" ></i></a>
             <div class="profile_left" id="profile" style="display: none;">
                <a onclick="bb()" href="profile.php" target="iframe"><i class='fa-solid fa-user' style=" margin-right: 10px;" ></i>Profile</a>
                <a onclick="bb()" href="change_password.php" target="iframe"><i class='fa-solid fa-key' style="margin-right: 10px;" ></i>Reset Password</a>
                <a href="../logout.php"><i class='fa-solid fa-lock' style="margin-right: 10px;" ></i>Logout</a>
             </div>
            </div>
         </div>
            <iframe src="dashboard.php" name="iframe" class="iframe" onclick="bb()"></iframe>
      </div>
   </div></a>
   <script type="text/javascript">

         var state=false;
         var state1=false;
         var state2=false;
      function g(){
         state=!state

         if(state===true){
            document.getElementById("sub-menu-2").style.display="block";
            document.getElementById("an_down").style.display="block";
             document.getElementById("an_rightt").style.display="none";
         }else{
            document.getElementById("sub-menu-2").style.display="none";
             document.getElementById("an_down").style.display="none";
             document.getElementById("an_rightt").style.display="flex";
         }
      }
      function profile_left(){
         state1=!state1;
         if(state1===true){
            document.getElementById("profile").style.display="grid"
         }else{            
            document.getElementById("profile").style.display="none"
         }
      }
      function bb(){  
            document.getElementById("profile").style.display="none"    
         }
   var index_box = document.getElementById("index_box");
   function showmenu(){
      index_box.style.left="0";
   }
   function hideMenu(){
      index_box.style.left ="-300px";
   }
     </script>
</body>
</html>