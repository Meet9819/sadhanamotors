<?php

// Turn off all error reporting
error_reporting(0);

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

// Report all PHP errors (see changelog)
error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

?>
<?php
//session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
    $reg_user->redirect('index.php');
}


if(isset($_POST['btn-signup']))
{
    $uname = trim($_POST['txtuname']);
    $email = trim($_POST['txtemail']);
    $upass = trim($_POST['txtpass']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);
    $code = md5(uniqid(rand()));
    
    $stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
    $stmt->execute(array(":email_id"=>$email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($stmt->rowCount() > 0)
    {
        $msg = "
              <div class='alert alert-danger'>
                <button class='close' data-dismiss='alert'>&times;</button>
                    <strong>Sorry !</strong>  Email allready exists , Please Try another one OR do you want to Login ?
              </div>
              ";
    }
    else
    {
        if($reg_user->register($uname,$email,$upass,$code,$mobile,$address))
        {           
            $id = $reg_user->lasdID();      
            $key = base64_encode($id);
            $id = $key;
            
            $message = " 




            <center>
            <img style='width:300px' src='https://sadhanamotors.com/assets/images/logo/logo.png'/>      <br>                
                        <p style='font-size:20px;color:black'><b>$userName,</b>
                        <br /><br>
                        Welcome to SADHANA MOTORS
<br>
To sign in to our website, use these credentials during checkout or on the <a style='color:blue' href='https://sadhanamotors.com/profile.php' target='_blank'> My Account </a> page:
<Br>
<b>Email:</b> $email
<Br>
<b>Password:</b> Password you set when creating account
<br>
If you have forgotten your account password then click <a style='color:blue' href='https://sadhanamotors.com/fpass.php' target='_blank'>here </a> to reset it. <br>
When you sign in to your account, you will be able to:
<br><br>
- Proceed through checkout faster <br>
- Check the status of your order <br>
- View order history
                   
                        <br /><br />
                        Thank You, Sadhana Motors <br>

</p></center>";
                        
            $subject = "Welcome to Sadhana Motor";
                        
            $reg_user->send_mail($email,$message,$subject); 
            $msg = "
                    <div class='alert alert-success'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Thank you for registering with SADHANA MOTORS. Please Sign In using your login credentials.
                    </div>
                    ";
        }
        else
        {
            echo "sorry , Query could no execute...";
        }       
    }
}
?>





 <?php include "allcss.php"; ?>

<body>

<div id="wrapper" class="wrapper clearfix">

	<?php include "header.php"; ?>

	<section id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<h1>register</h1>
				</div>
			
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">register</li>
					</ol>
				</div>
			
			</div>
			
		</div>
	
	</section>

		<div class="container">
			<div class="row">
				<div class="col-xs-12  col-sm-12  col-md-12">
				

						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-body">
									
									<h6>Register Form</h6>
									<div class="register-form">
										 

										 <?php if(isset($msg)) echo $msg;  ?> 
 
                                     
										 <form class="mb-0" action="" method="post" name="registration" id="create-account_form">
											<div class="form-group">
												<input class="form-control"  placeholder="Enter your username"  name="txtuname" required="" type="text"> 



											</div>
											<div class="form-group">
												<input class="form-control"  placeholder="Type your email address" name="txtemail" required="" type="email">
                                       
											</div>
											<div class="form-group">
												<input class="form-control" placeholder="Type your password" value="" name="txtpass"  required="" type="password">
											</div>
											<div class="form-group">
												<input class="form-control" id="mobile" placeholder="Enter Your Mobile No" value="" name="mobile" required="" type="text">
											</div>  


											<div class="form-group">
												<input class="form-control" id="address" placeholder="Enter Your Address" value="" name="address" required="" type="text">

											</div>


											<div class="checkbox">
												<label>
													<input type="checkbox" required="">
													I Agree To
													<a href="terms.php" target="_blank" >The Terms Of Use ?</a>
												</label>
											</div> 
 
<Br>
 	 <button type="submit" name="btn-signup" class="btn btn-primary btn-block"> Sign Up</button>


											
										</form>
										<div class="form-links text-center">
											<a href="login.php">Have an account? Login Here</a>
										</div>
									</div>
								</div>
							</div>
						
						</div>
				
				</div>
			
			</div>
			
		</div>

	
<?php include "footer.php"; ?>
</div>
<?php include "allscript.php"; ?>