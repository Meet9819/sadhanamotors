
<?php
error_reporting(0);
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
    
    
    $user_login->redirect('profile.php');
}

if(isset($_POST['btn-login']))
{
    $email = trim($_POST['txtemail']);
    $upass = trim($_POST['txtupass']);

    if($user_login->login($email,$upass))
    {
        $user_login->redirect('login.php');
    }
}
?>
    <!-- LOGIN --> 


    <?php include "allcss.php"; ?>

<body>

<div id="wrapper" class="wrapper clearfix">

	<?php include "header.php"; ?>

	<section id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<h1>
					login</h1>
				</div>
				
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">login</li>
					</ol>
				</div>
			</div>
		</div>
	
	</section>

		<div class="container">
			<div class="row">
				<div class="col-xs-12  col-sm-12  col-md-12">
				
						<div style="width: 370px;margin: 40px auto;">
							<div class="modal-content">
								<div class="modal-body">
									
									<h6>Login</h6>
									<div class="sign-form"> 

									   <?php 
        if(isset($_GET['inactive']))
        {
            ?>
             <div class='alert alert-danger'>
                <button class='close' data-dismiss='alert'>&times;</button>
                 <strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it.
              </div>
             <?php
        }
        ?>
		<?php
        if(isset($_GET['error']))
        {
            ?>
            <div class='alert alert-danger'>
                <button class='close' data-dismiss='alert'>&times;</button>
                  <strong>Wrong Details!</strong>
            </div>
        <?php
        }
        ?>

				<form class="mb-0" action="" method="post" name="registration" id="create-account_form">


											<div class="form-group">
												 <input class="form-control" placeholder="Enter your username"  id="email" name="txtemail" required="" type="email">

											</div>
											<div class="form-group">
											   <input class="form-control" id="passwd" name="txtupass" placeholder="Enter your Password" required="" type="password">
 

											</div>
											<div class="checkbox pull-left">
												<label>
													<input type="checkbox">
													Remember me</label>
											</div>
											<div class="pull-right lost-pass">
												<a href="fpass.php">Forget Password?</a>
											</div>  


											 <button type="submit" name="btn-login" class="btn btn-primary btn-block"> Sign In</button>


										</form>
										<div class="form-links text-center">
											<a href="register.php">Create New Account</a>
										</div>
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