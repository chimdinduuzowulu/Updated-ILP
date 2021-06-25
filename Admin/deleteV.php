<?php 
  include "../connectDb.php";
$id=isset($_GET["ID"]) ? intval($_GET["ID"]):null;
if(!empty($id)){
$remove = $conn->query("DELETE FROM LecturerVerify WHERE id=$id");
if($remove){
header("location: adminHome.php");
}


}




?>