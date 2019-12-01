<?php
session_start();
require_once("config.php");
	if(isset($_POST["login"])){
		if(isset($_POST["umail"]) && isset($_POST["upass"]) && !empty ($_POST["umail"]) && !empty($_POST["upass"])){
			
			$email= $_POST["umail"];
			$password= MD5($_POST["upass"]);
			
			$q1= "SELECT * FROM `registration_form` WHERE email='".$email."' and  password='".$password."'";
			
			$sql1= mysqli_query($con,$q1);
				if(mysqli_num_rows($sql1)>0){
					$msg="login succesfull";
					print_r($msg);
					$row= mysqli_fetch_assoc($sql1);
					unset($row["password"]);
						$_SESSION["registration_form"]=$row;
						print_r($_SESSION["registration_form"]);
						header('location:fatchdata.php');
					
				}else{
					$msg="user login usear name and password incarrot.".mysqli_error($con);
					print_r($msg);
					
		}
			
}

	}








 $usermailErr = $upswdErr = "";
 $umail = $upass= "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
	
	if (empty($_POST["umail"])){
		$umailErr = "email is required";
	} else {
		$umail =$_POST["umail"]; 
			  if (!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
                  $usermailErr = "Invalid email format"; 
               }
	}
		if (empty($_POST["upass"])){
		$upswdErr = "passworld is required";
	}else { 
		$upass =$_POST["upass"];
		}

	}

?>


<!doctype html>
<html>
<head>
<title>
login user
</title>
</head>
<body align="center">
<h2>user login</h2>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

Email :-<input type="email" name="umail">
<span class="error">* <?php echo $usermailErr;?></span><br><br>
passworld:-<input name="upass" type="password">
<span class="error">* <?php echo $upswdErr;?> </span>

<br><br>
<input type="submit" value="login" name="login">      
<a href="registeration form.php "><input type="button" value="Register"</a>
</form>

</body>

</html>