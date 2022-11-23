<?php
   include('../conn.php');
   include('../session.php');
   if(isset($_GET['dsname'])){
      $_SESSION['dsname']=$_GET['dsname'];
  }if(isset($_POST['submit'])){
      $_SESSION['year']=$_POST['year'];
   	echo "<script>document.location='med.php';</script>";
  }
   ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Placement Portal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.selector{
			margin-left: 35%;
			margin-top: 50px;
			width: 400px;
			min-height: 200px;
			border-radius: 10px;
			background: white;
            padding: 20px;
		}.a{
			text-decoration: none;
			color: white;
			background: #3c8dbc;
			margin-top: 40px;
			margin-left: 40%;
			padding: 7px 20px;
			width: 80px;
			border-radius: 40px;
			border: 1px solid #367fa9;
		}.a:hover{
			background:  #367fa9;
			border: 1px solid #367fa9;
		}
		@media(max-width: 1000px){
			.selector{
				margin-left: 0px;
				width: 99%;
			}.two{
				padding-left: 0px;
			}
		}
	</style>
</head>
<body>
	<form action="" method="post">
   <div class="selector"><div class="two">
               <label for="Fname">Year</label>
               <input type="number" class="input" name="year" required>
               </div>
               <div class="two" style="margin-left: 7%;"><input type="submit" name="submit" class="a" value="Select"> </div>
   </div></form>
</body>
</html>