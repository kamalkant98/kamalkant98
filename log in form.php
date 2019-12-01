<?php
session_start();
require_once("assest/php file/missindia_config.php");
if(isset($_POST["urlogin"])){
					if(isset($_POST["uemail"]) && isset($_POST["upass"]) && !empty ($_POST["uemail"]) && !empty ($_POST["upass"])){
						
						$email = $_POST['uemail'];
    					$password = md5($_POST['upass']);
						
						//echo $q;exit;
						
					$q="SELECT * FROM users WHERE email='".$email."' and password='".$password."'";
					//echo $q;exit;
					$sql1=mysqli_query($con,$q);
    				if(mysqli_num_rows($sql1 )>0){
						 $msg1="login succesfull.";
						 $row=mysqli_fetch_assoc($sql1);
						 unset($row["password"]);
						 	$_SESSION["user"]=$row;
							print_r($_SESSION["user"]);
							//exit;
						   header('location:index.php');
					}
					else{
				$msg="user login usear name and password incarrot.".mysqli_error($con);
				
			}
					}
			
			
					
		else {
		$msg="please fill all fields.";	
	}
				
}


?>



	<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- bxSlider Javascript file -->
<link href="assest/css/bootstrap.min.css" rel="stylesheet">
<link href="lightbox/dist/css/lightbox.min.css" rel="stylesheet">
<link href="assest/css/fontawesome.min.css" rel="stylesheet">
<link href="assest/css/style.css" rel="stylesheet">
<link href="assest/css/responcive style.css" rel="stylesheet">
<link href="assest/bxslider-4-master/src/css/jquery.bxslider.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assest/css/animate.min.css">
</head>

<body ng-app="missindia" ng-controller="missindiactrl">

<div class="bkimg">




<h2 class="loginheading text-center">Login to <span class="loinmissheading">Miss india </span></h2>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" >

			

  <div class="imgcontainer">
  
  <div class="notifaction col-md-12 text-center" style="color:rgba(252,0,4,1.00); font-size:20px;">
                 
                	<?php
 			 if(isset($msg)){
	  				echo'<div class="msgnoti">
					'.$msg.'
				</div>';
 					 }
  ?>
                
                </div>
  
    <img src="assest/img/avatar-512.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uemail" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="upass" required>
        
    <button type="submit" name="urlogin" class="butnlogin">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" >
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>


<?php include('footer.php'); ?>

-->
</body>
</html>
