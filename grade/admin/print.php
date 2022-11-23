<?php
   include('../conn.php');
   include('../session.php');
      $dsname=$_SESSION['ds'];
  $select=mysqli_query($conn,"select *from student where department='$dsname'");
   
  $counts=mysqli_num_rows($select);
 /* if(isset($_POST['sub'])){
require('FPDF/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(200,20,'Medicine Student List',"0","1","C");
$pdf->SetLeftMargin(30);
$pdf->SetTextColor(0,5,0);
if($counts>0){

$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,10,'R/N',"1","0","C");
$pdf->Cell(50,10,'Student ID',"1","0","C");
$pdf->Cell(50,10,'Full Name',"1","0","C");
$pdf->Cell(50,10,'GPA',"1","0","C");
$pdf->Cell(50,10,'Enterance',"1","0","C");
$pdf->Cell(50,10,'COC',"1","0","C");
$pdf->Cell(50,10,'Gender',"1","0","C");
$pdf->Cell(50,10,'Total',"1","1","C");
$n1=1;
  while($row=mysqli_fetch_assoc($select)){

$pdf->Cell(50,10,$n1,"1","0","C");
$pdf->Cell(50,10,$row['student_id'],"1","0","C");
$pdf->Cell(50,10,$row['fname'],"1","0","C");
$pdf->Cell(50,10,$row['grade'],"1","0","C");
$pdf->Cell(50,10,$row['enterance'],"1","0","C");
$pdf->Cell(50,10,$row['coc'],"1","0","C");
$pdf->Cell(50,10,$row['gender'],"1","0","C");
$pdf->Cell(50,10,$row['total'],"1","1","C");
$pdf->SetFont('Arial','B',10);
$pdf->Output();
$n1++;
  }
}
  }*/
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Placement</title>
	<link rel="stylesheet" type="text/css" href="style.css">
   <style type="text/css">
      .sub{
          background: #3c8dbc; 
          border: 1px solid #3c8dbc; 
          color: white;
      }.sub:hover{
         background: #367fa9;
      }
   </style>
</head>
<body id="window">

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
            <th>Transcript 11-12</th>
            <th>Transcript 9-10</th>
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
            <td>".$row['transcript1']."</td>
            <td>".$row['transcript2']."</td>
   			<td>".$row['department']."</td>
   		</tr>
   					";
   					$n1++;
   				}
   			}

   			?>
   		
   	</tbody>
   	</table><script type="text/javascript">


   function printj() {
      var windowthis=document.getElementById("window");
      window.print();
      //window.location="print.html";
      
   }

   function Back(){
      window.location="report.php";
   }
</script>
</body>
</html>