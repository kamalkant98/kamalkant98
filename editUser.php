<?php
session_start();
require_once("config.php");
if(isset($_GET["id"])){

			$q1='SELECT * FROM registration_form WHERE id='.$_GET["id"];
					//echo $q;exit;
					$sql=mysqli_query($con,$q1);
    				if(mysqli_num_rows($sql)>0){
						
						 $row=mysqli_fetch_assoc($sql);
						 unset($row["password"]);
						 //$_GET["id"]=$row;
							
					}
			
			}

if(isset($_GET["id"]) and isset($_POST["ureg"])){
		//echo $_GET["id"];
		$hobby=implode($_POST["uhobbi"],",");
		
		
		$q1='UPDATE `registration_form` SET `name`="'.$_POST["uname"].'",
	`email`="'.$_POST["umail"].'",`password`="'.$_POST["upass"].'",`phone`="'.$_POST["ufon"].'",`address`="'.$_POST["uadd"].'",
		`hobbies`="'.$hobby.'",`some_file`="'.$_POST["ufile"].'",`created`="CURRENT_TIMESTAMP",`modifie`="CURRENT_TIMESTAMP",
		`status`="3" WHERE `id`='.$_GET["id"];
		//echo $q1;exit;
		//$q1 ='SELECT * FROM `registration_form` WHERE id='.$_GET["id"];
		
		$sql1=mysqli_query($con,$q1);
			if(mysqli_affected_rows($con)>0){
				$msg=" user Updated succesfull. ";
				echo($msg);
				header('location:fatchdata.php');
				
			
					//echo $q;exit;
					$sql=mysqli_query($con,$q1);
    				if(mysqli_num_rows($sql1)>0){
						
						 $row=mysqli_fetch_assoc($sql1);
						 unset($row["password"]);
						 //$_SESSION["user"]=$row;
				}
			}
			else{
			
				$msg="Profile Updated unsuccesfull.".mysqli_error($con);
				echo($msg);
			}

}


$unameErr = $umailErr = $ufonErr = $uaddErr = $ufileErr = "";
$uname = $umail = $ufon = $uadd = $ufile = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if (empty($_POST["uname"])){
		$unameErr = "name is required";
	}else {
		$uname =$_POST["uname"];
	}
	if (empty($_POST["umail"])){
		$umailErr = "email is required";
	} else {
		$umail =$_POST["umail"]; 
			  if (!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
                  $umailErr = "Invalid email format"; 
               }
		
	}
	if (empty($_POST["ufon"])){
		$ufonErr ="phone number required";
		
	}else{
		$ufon =$_POST["ufon"];
	}
	if(empty($_POST["uadd"])){
		$uaddErr ="address is required";
	}else{
		$uadd =$_POST["uadd"];
	}
	if (empty($_POST["ufile"])){
		$ufileErr="required some file";
	}else {
		$ufile=$_POST["ufile"];
	}
}



?>

<html>
<head>
<title>
edituser
</title>
</head>
<body align="center">
<h2>registration from </h2>
<form action="<?php $_SERVER['PHP_SELF'] ?>?id=<?=$_GET["id"]?>" method="post" cellspacing="20">
NAme :-<input name="uname">
<span class="error">* <?php echo $unameErr;?></span>
Email :-<input type="email" name="umail">
<span class="error">* <?php echo $umailErr;?></span>
<br><br>
Password :- <input type="password" name="upass">
<br><br><br>
Phone :-<input name="ufon">
<span class="error">* <?php echo $ufonErr;?></span>
Address :-<textarea  name="uadd" rows="2"    rowspan=""> </textarea>
<span class="error">* <?php echo $uaddErr;?></span>
<br>
<h4>Hobbies</h4>


Sketch :-<input type="checkbox" name="uhobbi[]" value="Sketch" >
Crecket :-<input type="checkbox" name="uhobbi[]" value="Crecket">
Dance :-<input type="checkbox" name="uhobbi[]" value="Dance">
Singing :-<input type="checkbox" name="uhobbi[]" value="Singing">
Movies :-<input type="checkbox" name="uhobbi[]" value="Movies">
<br>
<br><br>
upload file  <input type="file" name="ufile">

<span class="error">* <?php echo $ufileErr;?></span>

<input type="submit" value="submit" name="ureg">


 
</form>




</body>





</html>  