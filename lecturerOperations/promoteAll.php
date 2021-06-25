<?php
include "../connectDb.php";
session_start();
$grade=$_SESSION["Grade"];
if($grade==="Grade1"){
$gradePromote="Grade2";
}

 elseif($grade==="Grade2"){
$gradePromote="Grade3";
}
elseif($grade==="Grade3"){
$gradePromote="Grade4";
}
elseif($grade==="Grade4"){
$gradePromote="Grade5";
}
elseif($grade==="Grade5"){
$gradePromote="Grade6";
}

else{
 $gradePromote=$grade;

}

$promote=$conn->query("UPDATE StudentTable SET Grade='$gradePromote' WHERE Grade='$grade'");
if($promote){
header("location:LDashboard.php");
}



?>