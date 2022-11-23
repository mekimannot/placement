<?php 
   
   include('../conn.php');
   include('../session.php');
   $select=mysqli_query($conn,"select *from student");
   $row=mysqli_fetch_assoc($select);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Werabe University</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="detail_box">
  	<h2>Student Information</h2>
  	<hr>
  	<div class="detail_input">
  		<div class="detail_row">
  			<div class="detail_label">
  				<label>First Name</label>
  				<input type="text" name="" value="<?php echo $row['fname']; ?>" readonly class="input">
  			</div>
  			<div class="detail_label">
  				<label>Middle Name</label>
  				<input type="text" name="" value="<?php echo $row['mname']; ?>" readonly class="input">
  			</div>
  			<div class="detail_label">
  				<label>Last Name</label>
  				<input type="text" name="" value="<?php echo $row['lname']; ?>" readonly class="input">
  			</div>
  		</div>
  		<div class="detail_row">
  			<div class="detail_label">
  				<label>Disability</label>
  				<input type="text" name="" value="<?php echo $row['disability']; ?>" readonly class="input">
  			</div>
  			<div class="detail_label">
  				<label>Natinality</label>
  				<input type="text" name="" value="<?php echo "Ethiopia"; ?>" readonly class="input">
  			</div>
  			<div class="detail_label">
  				<label>Region</label>
  				<input type="text" name="" value="<?php echo $row['region']; ?>" readonly class="input">
  			</div>
  		</div>
  		<div class="detail_row">
  			<div class="detail_label">
  				<label>GPA</label>
  				<input type="text" name="" value="<?php echo $row['grade']; ?>" readonly class="input">
  			</div>
  			<div class="detail_label">
  				<label>Enterance</label>
  				<input type="text" name="" value="<?php echo $row['enterance']; ?>" readonly class="input">
  			</div>
  			<div class="detail_label">
  				<label>COC</label>
  				<input type="text" name="" value="<?php echo $row['coc']; ?>" readonly class="input">
  			</div>
  		</div>
  		<div class="detail_row">
  			<div class="detail_label">
  				<label>Total</label>
  				<input type="text" name="" value="<?php echo $row['total']; ?>" readonly class="input">
  			</div>
  			<div class="detail_label">
  				<label>Gender</label>
  				<input type="text" name="" value="<?php echo $row['fname']; ?>" readonly class="input">
  			</div>
  			<div class="detail_label">
  				<label>Stream</label>
  				<input type="text" name="" value="<?php echo $row['stream']; ?>" readonly class="input">
  			</div>
  		</div>
  		<div class="detail_row">
  			<div class="detail_label">
  				<label>Year</label>
  				<input type="text" name="" value="<?php echo $row['year']; ?>" readonly class="input">
  			</div>
  			<div class="detail_label">
  				<label>Semester</label>
  				<input type="text" name="" value="<?php echo $row['semester']; ?>" readonly class="input">
  			</div>
  			<div class="detail_label">
  				<label>User ID</label>
  				<input type="text" name="" value="<?php echo $row['student_id']; ?>" readonly class="input">
  			</div>
  		</div>
  	</div>
  </div>
</body>
</html>