<?php
include "../connectDb.php";
session_start();
// Echo session variables that were set on previous page
// echo " " . $_SESSION["username"] . ".<br>";
if(isset($_POST["submit"])){
// // remove all session variables
session_unset();
// destroy the session
session_destroy();
header("location: login.php");
}
$lectures=$students=$pendingUsers=0;
$totalLecturer=$conn->query("SELECT MAX(id)  AS TOTAL FROM LecturerTable");
if($totalLecturer){
while($row=$totalLecturer->fetch_assoc()){
$lectures=$row["TOTAL"];

}
}
$totalstudent=$conn->query("SELECT MAX(id)  AS TOTALS FROM StudentTable");
if($totalstudent){
while($row=$totalstudent->fetch_assoc()){
$students=$row["TOTALS"];

}
}
$pending=$conn->query("SELECT MAX(id)  AS TOTALSS FROM LecturerVerify");
if($pending){
while($row=$pending->fetch_assoc()){
$pendingUsers=$row["TOTALSS"];

}
}
?>
<!DOCTYPE html>
<html>
<title>ILP | Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
</div>
<br><br><br>


  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
         <h3><?php echo $pendingUsers?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4><a href="verify.php" style="text-decoration:none;">Pending Users</a></h4>
      </div>
    </div>
    <div class="w3-quarter">
    
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3></h3>
        </div>
        <div class="w3-clear"></div>
        <h4><a href="searchUsers.php" style="text-decoration:none;">Search Users</a></h4>
      </div>
      
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $lectures?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Lecturers</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $students?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Students</h4>
      </div>
    </div>
  </div>
  <?php
$sqlQ=$conn->query("SELECT * FROM LecturerVerify");
if($sqlQ->num_rows == 0){
echo "";

}
else{

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
</table>";

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
}
?>
 

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
