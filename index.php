<?php 
session_start();
if (!isset($_SESSION['user_login']) && !isset($_SESSION['id'])) {
	$user = NULL;
	$uid = NULL;
}
else {
	$user = $_SESSION["user_login"];
	$uid = $_SESSION["id"];
	header("Location: home.php");
} 
?>

<html>
<!-- Bootstrap basic framework to work on -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Sign Up and Sign In Model</title>
	<!-- Bootstrap css included -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#0061aa">
		<h3 style="text-align:center;color:#ffffff">Sign in and Sign up Model</h3>
	<!-- Bootstrap container class every code is to be included here -->
	
	<div class="container">
		<!-- Bootstrap code here -->
		<!-- Row starts here-->
 <div class="row">
 	<!--login form div starts -->
    <div class="col-sm-5">
    	<div class="form-box">
        	<div class="form-top">
        		<div class="form-top-left">
					<img src="img/22.png" style="margin:0 auto;" class="img-circle img-responsive" alt="image" width="100" height="100" />
        			<h3 style="margin:1px auto;text-align:center;color:white;">Sign in Now</h3>
        		</div>
            </div>
            <div class="form-bottom">
                <form role="form" action="sign_up_in.php" method="post" class="login-form">
                	<div class="form-group">
                    	<input type="text" name="user_login" placeholder="Username..." class="form-username form-control" id="form-username">
                    </div>
                    <div class="form-group">
                    	<input type="password" name="password_login" placeholder="Password..." class="form-password form-control" id="form-password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Sign in</button> &nbsp;<button class="btn btn-primary">Forgot Password?</button>
                </form>
            </div>
        </div>      
    </div><!-- login ends here-->
    
    <div class="col-sm-1 middle-border"></div>
    <div class="col-sm-1" >
    <div style="height:500px; margin:20px 0; width:1px;background:white;"></div></div>


  	<!--signup form div starts -->  
    <div class="col-sm-5">
    	<div class="form-box">
    		<div class="form-top">
        		<div class="form-top-left">
        			<img src="img/21.png" style="margin:0 auto;" class="img-circle img-responsive" alt="image" width="100" height="100" />
        			<h3 style="margin:1px auto;text-align:center;color:white;">Sign up Now</h3>
        		</div>
            </div>
            <div class="form-bottom">
                <form role="form" action="sign_up_in.php" method="post" class="registration-form" enctype="multipart/form-data">
                	<div class="form-group">
                		<input type="text" name="fname" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
                    </div>
                    <div class="form-group">
                    	<input type="text" name="lname" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
                    </div>
                    <div class="form-group">
                    	<input type="text" name="username" placeholder="Username..." class="form-last-name form-control" id="form-last-name">
                    </div>
                    <div class="form-group">
                    	<input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
                    </div>
                    <div class="form-group">
                    	<input type="password" name="password" placeholder="Password..." class="form-last-name form-control" id="form-last-name">
                    </div>
                    <div class="form-group">
                    	<input type="password" name="cpassword" placeholder="Confirm Password..." class="form-last-name form-control" id="form-last-name">
                    </div>
                    <div class="form-group">
                    	<input type="file" name="myfile" class="form-last-name form-control" id="form-last-name"/>	
                    </div>
                    <div class="form-group">
                    	<input type="date" name="dob" placeholder="Date of birth" class="form-control">
                    </div>
                    <div class="form-group">
                    	<input type="radio" name="gender"  value="male" checked><b style="color:white;"> Male</b>
                    	<input type="radio" name="gender"  value="female"><b style="color:white;"> Female</b>
                    </div>
                    <div class="form-group">
                        <textarea name="bio" placeholder="About yourself..." class="form-about-yourself form-control" id="form-about-yourself"></textarea>
                    </div>
                    <button type="submit" name="reg" class="btn btn-primary">Sign me up!</button>&nbsp;<span 
				style='padding:9px; border-radius:5px; background-color:#337ab7; color:white;'>Already Registered?Login</span>
                </form>
            </div>
    	</div> 	
    </div>	<!--signup form div ends here -->
		
	</div><!-- container div ends here -->	
	<!-- Bootstrap javascript's plugins included -->
	<script src="https://ajax.googleapis.com/jax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/jquery-1.11.2.min.js"></script>
	<!-- Include all complied plugins -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>


