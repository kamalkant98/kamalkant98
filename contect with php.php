<?php
require_once("config.php");
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
//
if ($contentType == "application/json") {
	//echo($_SERVER["CONTENT_TYPE"]);
  //Receive the RAW post data.
  $content = trim(file_get_contents("php://input"));
  $decoded = json_decode($content, true);
  //If json_decode failed, the JSON is invalid.
  if(!is_array($decoded)) {
    //
  //Send Result

  } else 
  
  {
$res["error"]=true;
$res["data"]=NULL;
$res["Message"]="User Registration Failed.";
	if(isset($decoded["uname"]) and isset($decoded["umail"]) and isset($decoded["umobile"]) and isset($decoded["upass"])){
	
	$q=' INSERT INTO `users`( `name`, `email`, `mobile`, `password`, `created`, `modifie`, `status`) VALUES ("'.$decoded["uname"].'","'.$decoded["uemail"].'","'.$decoded["umobile"].'","'.md5($decoded["upass"]).'",CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,"4")';

	//echo $q;exit;
			$sql=mysqli_query($con,$q);
			if(mysqli_affected_rows($con)>0){
				
				$res["msg"]="user registration succesfull.";
				
			//echo "user registration succesfull.";	
			}
			else{
				$res["msg"]= "user registration faild.".mysqli_error($con);	
			}
	}
	else {
			//echo $q;exit;

		$res["msg"]="please fill all fields.";	
	}
  }
}

?>