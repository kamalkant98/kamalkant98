 <?php include('header.php'); ?>
<?php

require_once("assest/php file/missindia_config.php");
if(isset($_POST["reg"])){
	//echo $q1;exit;
	
		
	$profileimgname= time().''.  $_FILES["profileimg"]["name"];	
	
	$target='images/' .$profileimgname;
	
	if(move_uploaded_file($_FILES["profileimg"]["tmp_name"], $target)){
		
		
		$msg=" success photo uploding ";
		$css_class =" alert-success";
		
		
		$q1='UPDATE `users` SET `profile_pic`="'.$profileimgname.'",`first name`="'.$_POST["ftnam"].'",`last name`="'.$_POST["ltnam"].'",`dob`="'.$_POST["dob"].'",`height`="'.$_POST["uheight"].'",`weight`="'.$_POST["uweight"].'",`gander`="'.$_POST["ugen"].'", `address`="'.$_POST["uaddress"].'",`state`="'.$_POST["state"].'", `zip`="'.$_POST["uzip"].'",`website`="'.$_POST["uwesite"].'", `Place_of_birth`="'.$_POST["uplace"].'",`fax`="'.$_POST["ufax"].'",
		`district`="'.$_POST["district"].'",`about`="'.$_POST["umsg"].'" WHERE `id`="'.$_SESSION['user']['id'].'"';	
		
		
		
		
			$q="SELECT * FROM users WHERE id=".$_SESSION["user"]["id"];
					//echo $q;exit;
					$sql=mysqli_query($con,$q);
    				if(mysqli_num_rows($sql)>0){
						
						 $row=mysqli_fetch_assoc($sql);
						 unset($row["password"]);
						 $_SESSION["user"]=$row;
							
					}
	} else {
		$msg=" dont have photo uploding ";
		$css_class =" alert-danger";
		
		$q1='UPDATE `users` SET `first name`="'.$_POST["ftnam"].'",`last name`="'.$_POST["ltnam"].'",`dob`="'.$_POST["dob"].'",`height`="'.$_POST["uheight"].'",`weight`="'.$_POST["uweight"].'",`gander`="'.$_POST["ugen"].'", `address`="'.$_POST["uaddress"].'",`state`="'.$_POST["state"].'", `zip`="'.$_POST["uzip"].'",`website`="'.$_POST["uwesite"].'", `Place_of_birth`="'.$_POST["uplace"].'",`fax`="'.$_POST["ufax"].'",`district`="'.$_POST["district"].'",`about`="'.$_POST["umsg"].'" WHERE `id`="'.$_SESSION['user']['id'].'"';	
	}	

	
	
	 
	 
	
	
	
	//echo $q1;exit;//mysqli_affected_rows($con);exit;
	$sql1=mysqli_query($con,$q1);
			if(mysqli_affected_rows($con)>0){
				$msg=" Profile Updated succesfull. ";
				$css_class =" alert-success";
			
			
			$q="SELECT * FROM users WHERE id=".$_SESSION["user"]["id"];
					//echo $q;exit;
					$sql=mysqli_query($con,$q);
    				if(mysqli_num_rows($sql)>0){
						
						 $row=mysqli_fetch_assoc($sql);
						 unset($row["password"]);
						 $_SESSION["user"]=$row;
							
					}
			
			}
			else{
			
				$msg="Profile Updated unsuccesfull.".mysqli_error($con);
				$css_class =" alert-success";	
			}
		}





?>
<div class="container"  ng-controller="missindiactrl">
<div class="profilebox">
	<div class="row">
		<div class="col-md-12 col-sm-12 user-details">
            <div class="user-image">
               
            </div>
            <div class="user-info-block">
                <div class="user-heading">
                 <img src="images/<?php echo $_SESSION["user"]["profile_pic"] ?>" alt="picture" class="userimg1"/>
                	 
                
                    <h3><?php echo $_SESSION["user"]["first name"]?>   <?php echo $_SESSION["user"]["last name"]?></h3>
                    <span class="help-block"> <?php echo $_SESSION["states"]["name"]?></span>
                </div>
                
				<div class="tab-pane fade in active " id="information">
                
                
                        	<form class="form-horizontal" role="form"  action="<?php $_SERVER['PHP_SELF'] ?>" method="post"  name="missregfrm" enctype="multipart/form-data">
                
               <div class="reg1 text-center">
<div class="container-fluid">
<div class="row alert alert-warning alert-dismissible">


				<div class="notifaction col-md-11 text-center">
                 
                	<?php if(!empty($msg)):?>
                    <div class="alert <?php echo $css_class;?>">
					<?php echo $msg; ?>
					</div>
					<?php endif ; ?>
					
                
                </div>
                <div class="col-md-1">
                <button type="button" class="close" style="float:right;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                </div>
                </div>
               </div>
                
			
<div class="col-md-9 col-xs-12 formbox">

<div class="form-group ">
				
               <label for="profileimg" class="col-sm-3 control-label">profile</label>
               <div class="col-sm-9">
               
               <input type="file" name="profileimg" id="profileimg" >
               
               </div>
               </div>


	                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" name="ftnam" placeholder="First Name" class="form-control" value="<?=$_SESSION["user"]["first name"]?>" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="lastName" name="ltnam" placeholder="Last Name" class="form-control"  value="<?=$_SESSION["user"]["last name"]?>" autofocus>
                    </div>
                </div>
               
                
              
               
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">Date of Birth*</label>
                    <div class="col-sm-9">
                        <input type="date" id="birthDate" name="dob" class="form-control"
                        value="<?=$_SESSION["user"]["dob"]?>">
                    </div>
                </div>
               
                <div class="form-group hegbox col-md-6 ">
                        <label for="Height" class="col-sm-3 control-label">Height* </label>
                    <div class="col-sm-9">
                        <input type="number" id="height" name="uheight" placeholder="Please write your height in centimetres" class="form-control widthhwg  " value="<?=$_SESSION["user"]["height"]?>">
                    </div>
                </div>
                 <div class="form-group  hegbox col-md-6">
                        <label for="weight" class="col-sm-3 control-label">Weight* </label>
                    <div class="col-sm-9">
                        <input type="number" id="weight" name="uweight" placeholder="Please write your weight in kilograms" class="form-control widthhwg" 
                        value="<?=$_SESSION["user"]["weight"]?>">
                    </div>
                    
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3 col-xs-6">Gender</label>
                    <div class="col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="col-sm-4 col-xs-6">
                                <label class="radio-inline">
                                    <input type="radio" id="femaleRadio" name="ugen" value="female" <?php if($_SESSION["user"]['gander']=="female"){ echo "selected";}?>>Female
                                </label>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <label class="radio-inline">
                                    <input type="radio" id="maleRadio" name="ugen" value="male" <?php if($_SESSION["user"]['gander']=="male"){ echo "selected";}?>>Male
                                </label>
                                
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="form-group  hegbox col-md-6">
                        <label for="weight" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" id="add" placeholder="city" name="uaddress" class="form-control widthhwg"  value="<?=$_SESSION["user"]["address"]?>" >
                    </div>
                    
                </div>
                <div class="form-group  hegbox col-md-6">
                        <label for="weight" class="col-sm-3 control-label"> state</label>
                    <div class="col-sm-9">
                       
                        <select name="state" ng-change="fetchCities(state)" ng-model="state" id="" class="form-control">
                         <option value="<?=$_SESSION["user"]["state"]?>" selected disabled>Select state</option>
                        <?php
		
$sql="select * from states;";
$q=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($q)){
	
	echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
}
	?>
    
                        </select>
                       
                    </div>
                    
                </div>	
                <div class="form-group  hegbox col-md-6">
      <label for="weight" class="col-sm-3 control-label">district </label>
                    <div class="col-sm-9">
             <select name="district" id="" class="form-control">
          				<option value="" selected disabled>Select City</option>
                        <option  value="<?=$_SESSION["user"]["district"]?>" ng-value="city.id" ng-repeat="city in cities track by $index">{{city.city}}</option>
    
                        </select>
       
          
                    </div>
                    
                </div>
                 <div class="form-group  hegbox col-md-6">
                        <label for="weight" class="col-sm-3 control-label">ZIP </label>
                    <div class="col-sm-9">
                        <input type="text" id="zip" name="uzip" maxlength="6" placeholder="zipcode" class="form-control widthhwg" value="<?=$_SESSION["user"]["zip"]?>">
                    </div>
                    
                </div>
                
                <div class="form-group  hegbox col-md-6">
                        <label for="weight" class="col-sm-3 control-label">Website</label>
                    <div class="col-sm-9">
                        <input type="text" id="web" name="uwesite" placeholder="http//www." class="form-control widthhwg" value="<?=$_SESSION["user"]["website"]?>" >
                    </div>
                    
                </div>
                <!--<div class="form-group  hegbox col-md-6">
                        <label for="weight" class="col-sm-3 control-label">Telephone</label>
                    <div class="col-sm-9">
                        <input type="text" id="tel" name="utelphn" placeholder="telphone no" class="form-control widthhwg">
                    </div>
                    
                </div>-->
                
            <div class="form-group  hegbox col-md-6">
      <label for="weight" class="col-sm-3 control-label">Place </label>
                    <div class="col-sm-9">
          <input type="text" id="plbd" name="uplace" placeholder="Place of birth" class="form-control widthhwg" value="<?=$_SESSION["user"]["Place_of_birth"]?>" >
                    </div>
                    
                </div>
                <div class="form-group  hegbox col-md-6">
      <label for="weight" class="col-sm-3 control-label">Fax</label>
                    <div class="col-sm-9">
          <input type="text" id="Fax" name="ufax" placeholder="Fax" class="form-control widthhwg" value="<?=$_SESSION["user"]["fax"]?>">
                    </div>
                    
                </div>
                
                
              
				 <div class="form-group col-md-12  ">
      <label for="weight" class="col-sm-3 control-label">Why do you want to participate in this pageant?</label>
                    <div class="col-sm-9">
          <textarea id="msg" name="umsg" placeholder="how about you" class="form-control widthhwg" value="<?=$_SESSION["user"]["about"]?>"></textarea>
                    </div>
                    
                </div>
              
            <div class="submitbox text-center col-md-3 col-sm-3 col-md-offset-6 ">
                <button type="submit" name="reg" class="submitbtn text-center">submit</button>
           </div>
           </div>
           
         </form> 

                
                
                
                
                </div>
                
                
              	
                
                
       

 </div> </div>
                     
        </div>
	</div>	

</div>
 <script>
 
 var app=angular.module("missindia",[]);
		app.controller("missindiactrl",function($scope,$http){
			$scope.fetchCities=function(id){
				$http.get("http://localhost/miss%20india/layout/assest/php%20file/fatech%20in%20angularjs.php?id="+id).then(function(kam){
				$scope.cities=kam.data.data;
				console.log($scope.cities);
			})
			}});
 
 </script>
<?php include_once("footer.php")?>





