<!DOCTYPE html>
<html>
<title>Admin | Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/439a1fb029.js" crossorigin="anonymous"></script>
<style>
table td{margin:13px;color:red;text-align:center;}

</style>

<body class="w3-light-grey">


<?php
  include "../connectDb.php";
// echo $displayChoice." ".$limitValue;
echo "
<table class='w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white table'>
<tr class='table-light'>
<th>User_Id</th>
<th>Firstname</th>
<th>Lastname</th>
<th>LecturerEmailId</th>
<th>phone</th>
<th>GradeId</th>
<th>CourseTaught</th>
<th>Registration Date</th>
<th>pass Date</th>
<th>Registration Date</th>
</tr> 
";

// echo "yes";FName,LName,phone,,,,,
$sqlQ=$conn->query("SELECT * FROM LecturerVerify");
if($sqlQ){

while($row =$sqlQ->fetch_assoc()) {
$fid=$row['id'];
// $fname=$row['FName'];
$fname=$row['Fname'];
$lname=$row['Lname'] ;
$email=$row['LecturerEmailId'] ;
$phone=$row['phone'];
$Gd=$row['GradeId'];
$course=$row['CourseTaught'];
$pass=$row['pass'] ;
$qualification=$row['Qualifications'];
$regD=$row['reg_date'];

echo "<tr>";
echo "<td>" . $fid . "</td>";
  echo "<td>" . $fname . "</td>";
  echo "<td>" . $lname . "</td>";
  echo "<td>" . $email . "</td>";
  echo "<td>" . $phone . "</td>";
  echo "<td>" . $Gd. "</td>";
  echo "<td>" . $course. "</td>";
  echo "<td>" . $pass. "</td>";
  echo "<td>" . $qualification . "</td>";
   echo "<td>" . $regD . "</td>";
  echo "<td>" ."<a style='color:green;font-size:21px;' href='add.php?ID=$fid'><i class='fas fa-user-check'></i></i></a>  <a style='color:red;font-size:21px;' href='deleteV.php?ID=$fid'>  <i class='fas fa-trash-alt'></i></a>". "</td>";
  echo "</tr>";

// echo "</table>";
// mysqli_close($conn);
}



}
echo "</table>";

mysqli_close($conn);

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>