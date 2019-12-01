<?php
require_once("assest/php file/missindia_config.php");
if(isset($_POST["reg"])){
	if (isset($_POST["uemail"]) && isset($_POST['urpass'])){
		
		
		
    $email = $_POST['uemail'];
    $password = $_POST['urpass'];
    $cpassword = $_POST['reurpass'];
	//echo $password." AND $cpassword";exit;
    $q="SELECT * FROM users WHERE email = '$email'";
	if($password!=$cpassword){
		$msg="Password does not matched";
	}
	else{
    mysqli_query($con,$q);
    if(mysqli_num_rows($con)>0)
    {
        $msg="email already exists";
    }
		
		
		
	
	$q1='INSERT INTO `users`(`first name`, `last name`, `email`, `password`, `dob`, `mobile`, `height`, 
	`weight`, `gander`, `address`, `state`, `zip`, `website`, `Place_of_birth`, `fax`,`district`, `about`,
	`status`, `created`, `modifie`) 
	 VALUES ("'.$_POST["ftnam"].'","'.$_POST["ltnam"].'","'.$_POST["uemail"].'",MD5('.$_POST["urpass"].'),
	 "'.$_POST["dob"].'","'.$_POST["phonno"].'","'.$_POST["uheight"].'","'.$_POST["uweight"].'","'.$_POST["ugen"].'",
	 "'.$_POST["uaddress"].'","'.$_POST["state"].'","'.$_POST["uzip"].'","'.$_POST["uwesite"].'","'.$_POST["uplace"].'",
	 "'.$_POST["ufax"].'","'.$_POST["district"].'","'.$_POST["umsg"].'","4",CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)'; 
	
	//echo $q1;exit;
	$sql1=mysqli_query($con,$q1);
			if(mysqli_affected_rows($con)>0){
			$msg= "user registration succesfull.";
			
			
			
			}
			else{
				$msg='<div style="color:red;">"user registration faild."</div>'.mysqli_error($con) ;	
			}
		}
	}
	else {
		
		$msg='<div style="color:yellow;">"please fill all fields."</div>';	
	}
}



?>



	<?php include_once('header.php'); ?>       
     <div  ng-controller="missindiactrl"> 
<div class="aboutbanner">
<h1 class="abtheading">Regi<span class="outclr">stra</span>tion  </h1>

<br>
</div>

<div class="container regbox">
<div class="row ">
<form class="form-horizontal" role="form"  action="<?php $_SERVER['PHP_SELF'] ?>" method="post" ng-submit="currentIndex?updateStudent():state()" name="missregfrm">
                <h2>Registration</h2>
               <div class="reg1 text-center">
              		<h5>Please fill out the form below completely.
                     If approved, you will be contacted about other requirements. </h5>
                    <h5>Please fill out the form below completely. 
                    If approved, you will be contacted about other requirements.</h5>
                    <h5>– Two high resolution photos. One head shot and one full length.</h5>
                     <h5>
– Identification showing proof of age (passport, drivers license, etc).</h5>
<h5>– Identification showing proof of residency.</h5>
<div class="container-fluid">
<div class="row alert alert-warning alert-dismissible">


				<div class="notifaction col-md-11 text-center">
                 
                	<?php
 			 if(isset($msg)){
	  				echo'<div class="msgnoti">
					'.$msg.'
				</div>';
 					 }
  ?>
                
                </div>
                <div class="col-md-1">
                <button type="button" class="close" style="float:right;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                </div>
                </div>
               </div>
                <div class="contect2">
     			 <h4 class="cont1">CONTECT</h4>

      </div>

<div class="col-md-9 col-xs-12 formbox">
	                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" name="ftnam" placeholder="First Name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="lastName" name="ltnam" placeholder="Last Name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email* </label>
                    <div class="col-sm-9">
                        <input type="email" id="email" name= "uemail" placeholder="Email" class="form-control" >
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password*</label>
                    <div class="col-sm-9">
                        <input type="password" id="upassword" name="urpass" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
                    <div class="col-sm-9">
                        <input type="password" id="urpassword" name="reurpass" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">Date of Birth*</label>
                    <div class="col-sm-9">
                        <input type="date" id="birthDate" name="dob" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label">mobile number </label>
                    <div class="col-sm-9">
                        <input type="mobileNumber" id="mobileNumber" name="phonno" placeholder="Phone number" class="form-control">
                        <span class="help-block">Your phone number won't be disclosed anywhere </span>
                    </div>
                </div>
                <div class="form-group hegbox col-md-6 ">
                        <label for="Height" class="col-sm-3 control-label">Height* </label>
                    <div class="col-sm-9">
                        <input type="number" id="height" name="uheight" placeholder="Please write your height in centimetres" class="form-control widthhwg  ">
                    </div>
                </div>
                 <div class="form-group  hegbox col-md-6">
                        <label for="weight" class="col-sm-3 control-label">Weight* </label>
                    <div class="col-sm-9">
                        <input type="number" id="weight" name="uweight" placeholder="Please write your weight in kilograms" class="form-control widthhwg">
                    </div>
                    
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3 col-xs-6">Gender</label>
                    <div class="col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="col-sm-4 col-xs-6">
                                <label class="radio-inline">
                                    <input type="radio" id="femaleRadio" name="ugen" value="Female">Female
                                </label>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <label class="radio-inline">
                                    <input type="radio" id="maleRadio" name="ugen" value="Male">Male
                                </label>
                                
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="form-group  hegbox col-md-6">
                        <label for="weight" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" id="add" placeholder="city" name="uaddress" class="form-control widthhwg">
                    </div>
                    
                </div>
                <div class="form-group  hegbox col-md-6">
                        <label for="weight" class="col-sm-3 control-label"> state</label>
                    <div class="col-sm-9">
                       
                        <select name="state" ng-change="fetchCities(state)" ng-model="state" id="" class="form-control">
                         <option value="" selected disabled>Select state</option>
                        <?php
		
$sql="select * from states;";
$q=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($q)){
	
	echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
}
	?>
    
                        </select>
                        
<!--                        <datalist id="statename">
                        
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttaranchal</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
                                
                        
                        </datalist>
-->                       
                    </div>
                    
                </div>	
                <div class="form-group  hegbox col-md-6">
      <label for="weight" class="col-sm-3 control-label">district </label>
                    <div class="col-sm-9">
          <select name="district" id="" class="form-control">
          				<option value="" selected disabled>Select City</option>
                        <option ng-value="city.id" ng-repeat="city in cities track by $index">{{city.city}}</option>
    
                        </select>
          
          
                    </div>
                    
                </div>
                 <div class="form-group  hegbox col-md-6">
                        <label for="weight" class="col-sm-3 control-label">ZIP </label>
                    <div class="col-sm-9">
                        <input type="text" id="zip" name="uzip" maxlength="6" placeholder="zipcode" class="form-control widthhwg">
                    </div>
                    
                </div>
                
                <div class="form-group  hegbox col-md-6">
                        <label for="weight" class="col-sm-3 control-label">Website</label>
                    <div class="col-sm-9">
                        <input type="text" id="web" name="uwesite" placeholder="http//www." class="form-control widthhwg">
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
          <input type="text" id="plbd" name="uplace" placeholder="Place of birth" class="form-control widthhwg">
                    </div>
                    
                </div>
                <div class="form-group  hegbox col-md-6">
      <label for="weight" class="col-sm-3 control-label">Fax</label>
                    <div class="col-sm-9">
          <input type="text" id="Fax" name="ufax" placeholder="Fax" class="form-control widthhwg">
                    </div>
                    
                </div>
                
                
                <div class="col-md-6"></div>
				 <div class="form-group col-md-12  ">
      <label for="weight" class="col-sm-3 control-label">Why do you want to participate in this pageant?</label>
                    <div class="col-sm-9">
          <textarea type="text" id="msg" name="umsg" placeholder="how about you" class="form-control widthhwg"></textarea>
                    </div>
                    
                </div>
                <!-- /.form-group -->
<!--                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="help-block">*Required fields</span>
                    </div>
                </div>-->
            <div class="submitbox text-center col-md-3 col-sm-3 col-md-offset-6 ">
                <button type="submit" name="reg" class="submitbtn text-center">Register</button>
           </div>
           </div>
           </form>
        
           <div class="col-md-3">
      <div class="contectbox">
<div class="addrs">
<h4 class="iconbR"><i class="fas fa-home fa-1x"></i>Our address</h4>
<p class="content1"> IFC LLC 149-24 84th Street Howard 
Beach, NY 11414-1209 U.S.A  </p>
</div>
<div class="addrs">
<h4  class="iconbR"><i class="fas fa-mobile-alt  fa-1x "></i>Phone</h4>
<p class="content1">718-845-0742<br>
917-373-1838 </p>
</div>
<div class="addrs">
<h4  class="iconbR"><i class="far fa-envelope fa-1x"></i>Email</h4>
<p class="content1"> MSINDIAWW1@aol.com </p>
</div>
</div>
</div>
          </div>
           
           </div></div>
           <?php include('footer.php'); ?>
           



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
