<?php
   include('../conn.php');
   include('../session.php');
  $select=mysqli_query($conn,"select *from student where department='natural'");
  $counts=mysqli_num_rows($select);
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Placement</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   <div class="s1">
   	<div class="top"><h1>Welcome to natural science student List</h1><div class="right"><h1>Total Student</h1><p><?php  echo $counts; ?></p></div></div><hr>
   	<table  class="table">
   		<thead>
   		<tr>
   			<th>R/N</th>
   			<th>Student ID</th>
   			<th>Password</th>
   			<th>Full Name</th>
   			<th>GPA</th>
   			<th>Region</th>
   			<th>Disablity</th>
   			<th>Enterance</th>
   			<th>Gender</th>
   			<th>COC</th>
   			<th>Total</th>
   			<th>Department</th>
   		</tr></thead>
   		<tbody>
   			<?php
   			$n1=1;
   			$count=mysqli_num_rows($select);
   			if($count>0){
   				while($row=mysqli_fetch_assoc($select)){
   					echo "
         <tr>
   			<td>".$n1."</td>
   			<td>".$row['student_id']."</td>
   			<td>".$row['password']."</td>
   			<td>".$row['fname']." ".$row['lname']."</td>
   			<td>".$row['grade']."</td>
   			<td>".$row['region']."</td>
   			<td>".$row['disability']."</td>
   			<td>".$row['enterance']."</td>
   			<td>".$row['gender']."</td>
   			<td>".$row['coc']."</td>
   			<td>".$row['total']."</td>
   			<td>".$row['department']."</td>
   		</tr>
   					";
   					$n1++;
   				}
   			}

   			?>
            <form action="" method="post">
   			<tr>
   				<td colspan="12" bgcolor="gray"><input type="submit" name="sub" class="sub" value="Print"></td>
   			
   			</tr></form>
   		
   	</tbody>
   	</table>
   </div>a
</body>
</html>