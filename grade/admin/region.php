<?php
   include('../conn.php');
   include('../session.php');
        $select=mysqli_query($conn,"select *from region");
  if(isset($_POST['sub'])){
    $region_name=$_POST['region_name'];
    $status=$_POST['status'];
        $count=mysqli_num_rows($select);
    $insert=mysqli_query($conn,"insert into region(region_name,status) values('$region_name','$status')");
    if($insert){
        echo "<script type='text/javascript'>alert('seccussfuly Inserted');</script>";
        echo "<script type='text/javascript'>document.location='region.php';</script>";
        
    }else{
        echo "<script>alert('something wrong');</script>";
        echo "<script type='text/javascript'>document.location='region.php';</script>";
    }
  }
  if(isset($_GET['delete_id'])){
    $delete_id=$_GET['delete_id'];
    $delete=mysqli_query($conn,"delete from region where ID='$delete_id'");
    if($delete){
        echo "<script type='text/javascript'>alert('seccussfuly Deleted');</script>";
        echo "<script type='text/javascript'>document.location='region.php';</script>";
        
    }else{
        echo "<script>alert('something wrong');</script>";
        echo "<script type='text/javascript'>document.location='region.php';</script>";
    }
  }$num=0;
  if(isset($_GET['update_id'])){
    $update_id=$_GET['update_id'];
    $select1=mysqli_query($conn,"select *from region where ID='$update_id'");
    $num=mysqli_num_rows($select1);
    $r1=mysqli_fetch_assoc($select1);
  }if(isset($_POST['update'])){
    $region_name=$_POST['region_name'];
    $status=$_POST['status'];
    $update=mysqli_query($conn,"update region set region_name='$region_name',status='$status' where ID='$update_id'");if($update){
        echo "<script type='text/javascript'>alert('seccussfuly Updated');</script>";
        echo "<script type='text/javascript'>document.location='region.php';</script>";
        
    }else{
        echo "<script>alert('something wrong');</script>";
        echo "<script type='text/javascript'>document.location='region.php';</script>";
    }

  }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Werabe University</title>
    <script src="https://kit.fontawesome.com/3012035e7a.js" crossorigin="anonymous"></script>
      <link href="../fontawesome/css/fontawesome.css" rel="stylesheet">
      <link href="../fontawesome/css/brands.css" rel="stylesheet">
      <link href="../fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body><div style="display; block;">
     <div style="width: 90%; height: 70px; border-radius: 10px; background: white; margin-left: 5%; margin-top: 30px; padding: 10px;">
            <p>Add Region</p><br>
            <h2 style="color: #524d7d; font-size: 16px;">Dashboard > Region Module</h2>
        </div>
   <div class="add1">
       <div class="add2">
        <form action="" method="post">
                <div class="two" style=" margin-top: 50px;">
               <label for="">Region Name/Zone Name</label>
               <input type="text" name="region_name" class="input" value="<?php if($num>0){
                 echo $r1['region_name'];
               } ?>" required>
               </div><div style="display: flex; margin-top: 20px;"><div class="two" style=" display: flex;">
               <label for="">Normal</label>
               <input type="radio" name="status" value="Normal" <?php if($num>0){
                  $status=$r1['status']; if($status=="Normal"){?>
                       checked
                <?php  }
               } ?>  style="margin-left: 10px;" required>
               </div><div class="two" style=" display: flex;">
               <label for="">Affirmative</label>
               <input type="radio" name="status" <?php if($num>0){
                  $status=$r1['status']; if($status=="Affirmative"){?>
                       checked
                <?php  }
               } ?> value="Affirmative" style="margin-left: 5px;" required>
               </div></div>
               <div class="two" style="margin-left: 7%;"><input type="submit" <?php if($num>0){?>
                    name="update"
                <?php  }else{?>
                  name="sub"
               <?php } ?>  class="sub" value="Add Region" style="margin-left: 30%; background: green; margin-top: 40px; color: white;"> </div></form>
       </div>
       <div class="add3">
        <table  class="table">
        <thead>
        <tr>
            <th>R/N</th>
            <th>Region Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr></thead>
        <tbody>
            <?php
               $counts=mysqli_num_rows($select);
               $rn=1;
               if($counts>0){
                while($row=mysqli_fetch_assoc($select)){
                    echo "
        <tr>
            <td>".$rn."</td>
            <td>".$row['region_name']."</td>
            <td>".$row['status']."</td>
            <td><a href='region.php?update_id=".$row['ID']."'><i class='fa-solid fa-edit' ></i></a><a href='region.php?delete_id=".$row['ID']."'><i class='fa-solid fa-trash' style='color: red; margin-left: 20px;'></i></a></td>
        </tr>
                    ";
                    $rn++;
                }
               }
            ?>
    </tbody>
    </table>
        </div>
   </div></div>
</body>
</html>