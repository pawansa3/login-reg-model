<?php include('inc/header.inc.php'); ?>

<?php

@$Image_name = $_FILES['myfile']['name'];
@$Image_size = $_FILES['myfile']['size'];
$max_size = 5242880;//image<5mb
$extension = strtolower(substr($Image_name, strpos($Image_name, '.') + 1));
@$type = $_FILES['myfile']['type'];
@$tmp_name = $_FILES['myfile']['tmp_name'];

//sign up code
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) 
	&& isset($_POST['cpassword']) && isset($_POST['dob']) && isset($_POST['gender']) && isset($_POST['bio']) && isset($Image_name))
{
	if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) 
		&& !empty($_POST['cpassword']) && !empty($_POST['dob']) && !empty($_POST['gender']) && !empty($_POST['bio']) && !empty($Image_name))
	{
		//declaring variables to prevent errors
		$fn = $_POST['fname']; //First Name
		$ln = $_POST['lname']; //Last Name
		$un = $_POST['username'];; //Username
		$em = $_POST['email'];; //Email
		$pswd = $_POST['password'];; //Password
		$cpswd = $_POST['cpassword'];; // Password 2
		$dob = $_POST['dob'];//dob
		$gender = $_POST['gender'];//gender
		$bio = $_POST['bio'];//bio

		//registration form
		$un = strip_tags(@$_POST['username']);
		$fn = strip_tags(@$_POST['fname']);
		$ln = strip_tags(@$_POST['lname']);
		$em = strip_tags(@$_POST['email']);
		$pswd = strip_tags(@$_POST['password']);
		$cpswd = strip_tags(@$_POST['cpassword']);
		$gender = strip_tags(@$_POST['gender']);
		$dob = strip_tags(@$_POST['dob']);
		$bio = strip_tags(@$_POST['bio']);
		
		$dob = date('Y-m-d', strtotime($dob));// converting the date format

		//check image extensions
		if(($extension=='jpg' || $extension=='jpeg') && $type=='image/jpeg' && $Image_size<$max_size)
		{	
			$location = 'imageupload/';
			if(move_uploaded_file($tmp_name, $location.$Image_name))
			{			}
			else
			{
				echo 'There was an error in Image Upload';
			}
		}
		else
		{
			echo 'File must be less than 5mb and jpg/jpeg ';
		}
					
		// Check if user already exists
		$u_check = mysql_query("SELECT u_un FROM users WHERE u_un='$un'");
		// Count the amount of rows where username = $un
		$check = mysql_num_rows($u_check);
		//Check whether Email already exists in the database
		$e_check = mysql_query("SELECT u_em FROM users WHERE u_em='$em'");
		//Count the number of rows returned
		$email_check = mysql_num_rows($e_check);
		if (($check == 0) && ($email_check == 0)) 
		{
			if ($pswd==$cpswd) 
			{
				if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25) 
					echo "The maximum limit for username/first name/last name is 25 characters!";
				else if (strlen($pswd)>30||strlen($pswd)<8) 
						echo "Your password must be between 8 and 30 characters long!";
				else
				{
					//encrypt password and cpassword  using md5 before sending to database
					$pswd = md5($pswd);
					$cpswd = md5($cpswd);
					$query = "INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$pswd','$dob','$gender','$bio','$Image_name')";
					$query_run = mysql_query($query);
					if($query_run)
						die("<h2>Welcome to Our WebSite</h2>Login to your account to get started ...");
					else
						echo "Something went wrong!";
				}
			}
			else 
				echo "Your passwords don't match!";
		}
		else
			echo "Someone has already taken that username or Email.";
	}
	else
		echo "Please fill all the fields.";
}
//sign up ends here

//user login code
if (isset($_POST["user_login"]) && isset($_POST["password_login"])) 
{
	if(!empty($_POST['user_login']) && !empty($_POST['password_login'])) 
	{
		// filter everything but numbers and letters
		$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); 
		$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); 
	    $md5password_login = md5($password_login);
	    // query the person
	    $sql = mysql_query("SELECT u_id FROM users WHERE u_un='$user_login' AND u_pw='$md5password_login' LIMIT 1"); 
	    //Check for their existance
	    //Count the number of rows returned
		$userCount = mysql_num_rows($sql); 
		if ($userCount == 1) 
		{
			while($row = mysql_fetch_array($sql)){ 
	             $id = $row["u_id"];
			}
			 $_SESSION["user_login"] = $user_login;
			 $_SESSION["id"] = $id;
			 echo "logged in successfully !!!";
	         //header("Location: home.php");
	         //exit("<meta http-equiv=\"refresh\" content=\"0\">");
		} 
		else {
			
			echo "<script>alert('Invalid username and password')</script>";
			//exit();
		}
	}
	else {
		echo "Please enter the username and password.";
	}
}
?>
