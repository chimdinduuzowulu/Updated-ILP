<?php
error_reporting (E_ALL ^ E_NOTICE); 
session_start();
include "connectDb.php";
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$uEmail= $_POST["Email"];
$uP= $_POST["passWord"];
$passError= $UserNameError="";
if (isset($_POST["submit"])){
        $sql = "SELECT * FROM StudentTable";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row  
        while($row = mysqli_fetch_assoc($result)) {
        if($row["StudentEmailId"]==$uEmail && $row["passW"]==$uP){
        $passError=$UserNameError="";
		$fnamehold=$row["Fname"];
		$lnamehold=$row["Lname"];
		$Studenemail=$row["StudentEmailId"];
		$upass=$row["passW"];
        $_SESSION["username"] = $fnamehold." ".$lnamehold;
        $_SESSION["Password"] = $uP;
		// $_SESSION["addItems"]=$row["Email"];
		$_SESSION["EmailId"]=$row["StudentEmailId"];
        header("location: studentDashboard.php");
        
            }
        }
        } 
        
        $passError=$UserNameError="password or username Error: *";
        
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
<!--===============================================================================================-->
<!-- Required meta tags-->
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <!-- Title Page-->
    

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
</head>
<body>
<div class="topnav">
        <a class="active" href="index.php">Home</a>
        <a href="#news">Books</a>
		<a href="#about">Tafseers</a>
		<a href="#contact">Lectures</a>
        <button  class="dropbtn" style="position: absolute; margin-left:845px;">Search</button>

        <input type="text" placeholder="Type here" id="myInput" style="position: absolute; margin-left:585px;">
       
      </div>

<div class="container">

<div class="page-header">
    <h1>Log-in<small> start learning now</small></h1>
</div>


<div class="container-fluid pb-video-container" style="height: 900px;">
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						LogIn as Student
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="Email" placeholder="Email:" value="<?php echo $uEmail?>" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="passWord" placeholder="Password" value="<?php echo $uP?>" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
						
						<p style="color:red; font-size:18px;text-align:center;" ><?php echo $passError?></p>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn" style="color: : white">
						<input type="submit" name="submit" class="login100-form-btn">
					
					</div>
					
					<div class="text-center p-t-90">
						<a href="register/registerFarmer.php" class="txt1" href="register/register.php">
							New User?<br>
						</a>
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
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
 
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>