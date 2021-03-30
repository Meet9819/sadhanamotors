
<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();




if(isset($_POST['btn-signup']))
{
    $email = trim($_POST['txtemail']);
 
    
            
            $message = " 

            <center>
            <img style='width:300px' src='http://sadhanamotors.com/assets/images/logo/logo.png'/>      <br>                
                        <p style='font-size:20px;color:black'><b>$userName,</b>
                        <br /><br>
                        Welcome to SADHANA MOTORS
                   
                        <br /><br />
                        Thank You, Sadhana Motors <br>

</p></center>";
                        
            $subject = "Welcome to Sadhana Motor";
                        
            $reg_user->send_mail($email,$message,$subject); 
          
       
            
    
}
?>


                                     
										 <form class="mb-0" action="" method="post">
										
											<div class="form-group">
												<input class="form-control"  placeholder="Type your email address" name="txtemail" required="" type="email">
                                       
											</div>
											
 
<Br>
 	 <button type="submit" name="btn-signup" class="btn btn-primary btn-block"> Sign Up</button>


											
										</form>
									
							