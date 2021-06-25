<?php
  include "../connectDb.php";
$id=isset($_GET["ID"]) ? intval($_GET["ID"]):null;
if(!empty($id)){
$sqlQ=$conn->query("SELECT * FROM LecturerVerify WHERE id=$id");
if($sqlQ){
while($row =$sqlQ->fetch_assoc()) {
$fid=$row['id'];
$fname=$row['Fname'];
$lname=$row['Lname'] ;
$email=$row['LecturerEmailId'] ;
$phone=$row['phone'];
$Gd=$row['GradeId'];
$course=$row['CourseTaught'];
$pass=$row['pass'] ;
$qualification=$row['Qualifications'];
$regD=$row['reg_date'];
// $courseId=$row['CourseId'];
// $ProfileImage=$row['profileImage'];


}

$put = $conn->query("INSERT INTO LecturerTable (Fname,Lname,phone,LecturerEmailId,GradeId,pass,CourseTaught,Qualifications)
VALUES('$fname','$lname','$phone','$email','$Gd','$pass','$course','$qualification')");
if($put){
echo " ";

$remove = $conn->query("DELETE FROM LecturerVerify WHERE id=$id");
if($remove){
header("location: adminHome.php");


}
else{echo "error";}



}
else{ echo " could not add";}
}
}

?>
