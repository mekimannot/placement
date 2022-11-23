<?php
   include('../conn.php');
   include('../session.php');
   $select=mysqli_query($conn,"select *from staff where ID='$session_id'");
   $row=mysqli_fetch_assoc($select);
   ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Placement</title>
	<style type="text/css">
		.container{
			margin-top: 40px;
			margin-left: 40px;
			margin-right: 40px;
			display: block;
		}.welcome_container{
			background: white;
			width: 100%;
			height: 80px;
			border-radius: 8px;
			text-align: center;

		}.welcome_container p{
          padding-top: 10px;
		}.welcome_container h2{
			margin-top: -10px;
		}
        .bottom{
            -webkit-transform: rotate(-10deg);
            -moz-transform: rotate(-10deg);
            -ms-transform: rotate(-10deg);
            -o-transform: rotate(-10deg);
            transform: rotate(-10deg);
            -webkit-transform-origin: 50% 50%;
            -moz-transform-origin: 50% 50%;
            -ms-transform-origin: 50% 50%;
            -o-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        width: fit-content;
        height: 80px;
        }.bot{
            -webkit-transform: rotate(10deg);
            -moz-transform: rotate(10deg);
            -ms-transform: rotate(10deg);
            -o-transform: rotate(10deg);
            transform: rotate(W10deg);
            -webkit-transform-origin: 50% 50%;
            -moz-transform-origin: 50% 50%;
            -ms-transform-origin: 50% 50%;
            -o-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        margin-left: 450px;
        margin-top: -105px;
        width: fit-content;
        height: 80px;
        }.text_container{
        	margin-top: 100px;
        	text-align: center;
        	margin-right: 40px;
        }@media(max-width: 1000px){
        	.text_container h1{
        		font-size: 15px;
        	}
        }
	</style>
</head>
<body>
	<div class="container">
		<div class="welcome_container">
			<p>Welcome Back</p>
			<h2 style="color: #524d7d;"><?php echo $row['fname']; echo " "; echo $row['mname']; ?></h2>
		</div>
		<div class="text_container">
			<h1>Welcome To Werabe University Student Placement Portal</h1> 
			<img src="../images/w.jpg" width="200px" height="100px" id="im">
		</div>
	</div>
</body>
</html>