<?php
session_start();
require_once("config.php");


if (isset($_POST["ureg"])){
	if (isset($_POST["umail"]) && isset($_POST["upass"])){
		
	
	
	$hobby=implode($_POST["uhobbi"],",");
	$q1 =' INSERT INTO `Registration_form`(`name`, `email`,`password`, `phone`, `address`, `hobbies`, `some_file`, `created`,`modifie`, `status`) VALUES (	"'.$_POST["uname"].'","'.$_POST["umail"].'",MD5('.$_POST["upass"].'),"'.$_POST["ufon"].'","'.$_POST["uadd"].'","'.$hobby.'","'.$_POST["ufile"].'","3",CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)';
	//print_r($q1);exit;
	
		$sql1= mysqli_query($con,$q1);
		if(mysqli_affected_rows($con)>0){
				$msg="user registration succesfull.";
				print_r ($msg);
		}
		else {
				$msg="user registration faild.";
				print_r($msg).mysqli_error($con);
		}
	}else {
			$msg="please fill all fields.";
			print_r ($msg);
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
registration from
</title>
</head>
<body align="center">
<h2>registration from </h2>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" cellspacing="20">
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