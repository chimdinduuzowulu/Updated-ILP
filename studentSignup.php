<?php
error_reporting (E_ALL ^ E_NOTICE); 
include "connectDb.php";
// Create connection
$conn = mysqli_connect($serverName, $userName, $password,$database);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$classFull=0;
$fname = $_POST["first_name"];
$lname = $_POST["last_name"];
$Email = $_POST["email"];
$phone = $_POST["phone"];
$passW = $_POST["password"];
// $grade=$_POST["Grade"];
// $confirmPassW = $_POST["retyped_password"];
$UsedEmail="";
$passwordNoM=$fullClassMessage="";
$flag = false;
if(isset($_POST["submit"]))
{

$checkEmail = "SELECT * FROM StudentTable";
        $result = mysqli_query($conn, $checkEmail);
        if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {
            if($row["Email"]==$Email){
            $flag=TRUE;
            // $classFull=$row["id"];
            $UsedEmail="This email already exits...";
            
            }
         
         }
        
        }
// to check if class is full
$checfullclass = "SELECT MAX(id) AS FULL FROM StudentTable";
        $result = mysqli_query($conn, $checfullClass);
        if (mysqli_num_rows($result) > 0) {
        $classFull=$row["FULL"];
        if($classFull >= 20){
        $flag=TRUE;
        $fullClassMessage="Sorry the class is already full!";
        }
        else{
        $flag =false;
        }
      
        
        }


if($flag ==false) {

$put = "INSERT INTO StudentTable (FName,LName,StudentEmailId,phone,passW)
VALUES('$fname','$lname','$Email','$phone','$passW')";
if (mysqli_query($conn, $put)){
$success="Your Account was created successfully";
header("location: StudentLogin.php");
} 
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);}

}

}


mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <!-- Title Page-->
    <title>Student Registration </title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <meta charset="utf-8" />
    <title>lectures-05</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="topnav">
        <a class="active" href="index.php">Home</a>
        <a href="#news">Books</a>
        
        <a href="#about">Tafseers</a>   
        <a href="#about">Lectures</a>    
         <button  class="dropbtn" style="position: absolute; margin-left:845px;">Search</button>

        <input type="text" placeholder="Type here" id="myInput" style="position: absolute; margin-left:585px;">
       
      </div>

<div class="container">

<div class="page-header">
    <h1>Welcome <small>sign-up to be our student</small></h1>
</div>


<div class="container-fluid pb-video-container" style="height: 900px; width:90%; float:center; margin:auto;" > 
    
         <form id="form" method="POST">

                <div class="form-row">
                <?php echo $fullClassMessage;?>
                    <div class="form-group col-md-5">
                      <label for="firstName">First Name</label>
                      <input type="text" name="first_name" class="form-control" id="inputfirstName">
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                          <label for="lastName">Last Name</label>
                          <input type="text" name="last_name" class="form-control" id="inputlastName">
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="contactNo">Contact Number</label>
                              <input type="number" name="phone" class="form-control" id="inputcontactNumber">
                            </div>
                            <br>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
                  </div>
                  <br>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
                  </div>
                </div>
                <br>
                <button type="submit" name="submit" class="btn btn-primary">Sign up</button>  <button type="submit" name="submit" class="btn btn-primary"><a href="StudentLogin.php">Login</a></button>
              </form>
</div>    
    
    
    
    
    
    
    
    
    
    
    <style>
        #myInput {
      box-sizing: border-box;
      background-image: url('searchicon.png');
      background-position: 14px 12px;
      background-repeat: no-repeat;
      font-size: 16px;
      padding: 16px 20px 12px 45px;
      border: none;
      border-bottom: 1px solid #ddd;
    }
    .dropbtn {
      background-color: #f0ad4e;
      color: white;
      padding: 15px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }
    .dropbtn:hover, .dropbtn:focus {
      background-color: lightgray;
    }
    #myInput:focus {outline: 3px solid #ddd;}
        .topnav {
      overflow: hidden;
      background-color: #333;
    }
    
    .topnav a {
      float: left;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }
    
    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }
    
    .topnav a.active {
      background-color: #f0ad4e;
      color: white;
    }
        
       
    .pb-video-container {
            padding-top: 20px;
            background: #bdc3c7;
            font-family: Lato;
        }
    
        .pb-video {
            border: 1px solid #e6e6e6;
            padding: 5px;
        }
    
            
    
       
    
            .pb-video-frame:hover {
                height: 300px;
            }
    
        .pb-row {
            margin-bottom: 10px;
        }
    </style>
    
    
    </div>
     <!-- Jquery JS-->
     <script src="vendor/jquery/jquery.min.js"></script>
     <!-- Vendor JS-->
     <script src="vendor/select2/select2.min.js"></script>
     <script src="vendor/datepicker/moment.min.js"></script>
     <script src="vendor/datepicker/daterangepicker.js"></script>
 
     <!-- Main JS-->
     <script src="js/global.js"></script>
 
 
    
    </body>
    </html>