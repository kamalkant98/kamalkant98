<?php
session_start();
require_once("config.php");

if(isset($_GET["log"]) && $_GET["log"]=="out"){
	session_destroy();
	header("location:login.php");
}

if(isset($_GET["id"])){
	
			$q1='DELETE FROM `registration_form` WHERE id='.$_GET["id"];
			
		/*$q1='DELETE `registration_form` SET `name`="'.$_POST["uname"].'",
	`email`="'.$_POST["umail"].'",`password`="'.$_POST["upass"].'",`phone`="'.$_POST["ufon"].'",`address`="'.$_POST["uadd"].'",
		`hobbies`="'.$hobby.'",`some_file`="'.$_POST["ufile"].'",`created`="CURRENT_TIMESTAMP",`modifie`="CURRENT_TIMESTAMP",
		`status`="3" WHERE `id`='.$_GET["id"];*/
		//echo $q1;exit;
		$sql1=mysqli_query($con,$q1);
			if(mysqli_affected_rows($con)>0){
				$msg=" user Updated succesfull. ";
				echo($msg);
				//header('location:fatchdata.php');
				
			
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
?>
     uj j j  j 

?>

<!doctype html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
  
<body>
<a href="?log=out">
<input type="submit" value="logout" name="logout"></a>

<form action="search.php" method="GET">
    <input type="text" name="query" />
    <input type="submit" value="Search" />
</form>

<table border="1" width="100%">

<tr>
	<td>#</td>
	<td>name</td>
    <td>Email</td>
    <td>phone</td>
    <td>address</td>
    <td>hobbies</td>
    <td>uploaded file</td>
	<td>create</td>
	<td>modifie</td>
	<td>status</td>
	<td>Action</td>
</tr>
<?php

$sql1= "select * FROM `registration_form`";
$q1= mysqli_query($con,$sql1);
while($row=mysqli_fetch_assoc($q1)){
		
		echo '<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["name"].'</td>
				<td>'.$row["email"].'</td>
				
				<td>'.$row["phone"].'</td>
				<td>'.$row["address"].'</td>
				<td>'.$row["hobbies"].'</td>
				<td>'.$row["some_file"].'</td>
				<td>'.$row["created"].'</td>
				<td>'.$row["modifie"].'</td>
				<td>'.$row["status"].'</td>
				<td><a href="editUser.php?id='.$row["id"].'">Edit</a>
					<a href="?id='.$row["id"].'">delete</a>

				</td>';
				echo '</tr>';
}



?>


</table>
</body>
</html>