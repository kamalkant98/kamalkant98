<?php


session_start();
require_once("assest/php file/missindia_config.php");

if(isset($_POST["log"]) && $_POST["log"]=="out"){
	session_destroy();
	header("location:login.php");
}
if(!isset($_SESSION["user"]['email'])){
header('location:log in form.php');
}

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>miss india</title>
<link rel="shortcut icon" href="assest/img/background-logo.png" type="image/x-icon">
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
<script src="assest/js/angular.min.js"></script>
</head>

<body ng-app="missindia">

<div class="bkimg">

<header>
		<nav class="navbar navbar-default navbar-fixed-top">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="row navbarbox">
    <div class="navbar-header col-md-2 col-sm-3 col-xs-6">
     
      <a class="navbar-brand" href="index.php"><img src="assest/img/logo.png" class="img-responsive animated bounce bounceInLeft delay-1s logoimg" alt="Transparent MDB Logo"  id="animated-img1"></a>
      </div>
       <div class="navbarmenu text-center col-md-7 col-sm-9">
       
       <a class="btn btn-primary menubarbtn" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
   <i class="fas fa-bars menutreeline fa-2x"></i>
  
  </a>
  		<div class="collapse" id="collapseExample">
  <div class="card card-body menubarname">
  <ul>
  		<li class="active homeatv"><a href="index.php">HOME</a></li>
        <li> <a href="miss india about.php">MISS INDIA</a></li>
        <li> <a href="winners in all year.php">WINNERS</a></li>
        <li> <a href="regster form.php">REGISTER</a></li>
        <li><a href="gallery.php">GALLERY</a></li>
        <li><a href="video.php">VIDEOS</a></li>
        <li><a href="about page.php">ABOUT US</a></li>
        <li><a href="upcomin event.php">UPCOMING IVENTS </a></li>
  </ul>
  <div class="mobscrnsocialicon col-sm-12">
  
   <ul class=" col-sm-12">
        <li><a href=""><i class="fas fa-user fa-2x animated bounce bounceInRight delay-0.5s"></i> </a></li>
        <li><a href="#"><i class="fab fa-twitter fa-2x animated bounce bounceInRight delay-0.5s"></i></a></li>
        <li><a href="#"><i class="fab fa-facebook-f fa-2x animated bounce bounceInRight delay-0.5s"></i></a></li>
        <li><a href="#"><i class="fab fa-google fa-2x animated bounce bounceInRight delay-0.5s"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram fa-2x animated bounce bounceInRight delay-0.5s fast"></i></a></li>
        
      </ul>
      </div>
  </div>
</div>
      </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse col-md-3 col-sm-12" >
   
      
      <div class="socialicon  ">
      <ul class="nav navbar-nav navbar-right">
   <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-2x animated bounce bounceInRight delay-0.5s"></i>  <span class="caret"></span></a>
          <ul class="dropdown-menu text-center">
            <li><a href="#"><?php echo $_SESSION["user"]["first name"]?>   <?php echo $_SESSION["user"]["last name"]?></a></li>
            <li><a href="#"><?php echo $_SESSION["user"]["email"]?></a></li>
            <li><a href="profile.php">Profile</a></li>
         
            	
          		<button class="" type="button">logout</button>
                
               
          </ul>
        </li>
       
        <li><a href="#"><i class="fab fa-twitter fa-2x animated bounce bounceInRight delay-0.5s"></i></a></li>
        <li><a href="#"><i class="fab fa-facebook-f fa-2x animated bounce bounceInRight delay-0.5s"></i></a></li>
        <li><a href="#"><i class="fab fa-google fa-2x animated bounce bounceInRight delay-0.5s"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram fa-2x animated bounce bounceInRight delay-0.5s fast"></i></a></li>
        
      </ul>
      </div>
    </div>
    </div>
    <!-- /.navbar-collapse --> 
  <!-- /.container-fluid --> 
</nav>
</header>