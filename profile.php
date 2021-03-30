<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["userSession"])){
header("Location: login.php");
exit(); }
?>

    <?php
include 'logindb.php';
$query = $db->query("SELECT * FROM tbl_users WHERE userID = ".$_SESSION['userSession']);

$custRow = $query->fetch_assoc();
?>
     



<?php include "allcss.php"; ?>

<body>

<div id="wrapper" class="wrapper clearfix">
    <?php include "header.php"; ?>

  <section id="page-title" class="page-title">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
          <h1>Profile </h1>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-6">
          <ol class="breadcrumb text-right">
            <li>
              <a href="index.php">Home</a>
            </li>
            <li class="active">Profile</li>
          </ol>
        </div>
        
      </div>
    
    </div>
  
  </section>





  <section id="featured1" class="featured featured-1">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">

    <?php

    error_reporting(0);

    require_once 'admin/dbconfig.php';


    if(isset($_POST['btn_save_updates']))
    {
   $userID = $_POST['userID'];
      $lastname = $_POST['lastname'];
  $pincode = $_POST['pincode'];


       $userName = $_POST['userName'];
        $state = $_POST['state'];
         $mobile = $_POST['mobile'];
          $address = $_POST['address'];

         $phone = $_POST['phone'];
          $country = $_POST['country'];
        
         $city = $_POST['city'];
         


        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE tbl_users SET lastname=:lastname,userName=:userName,state=:state,mobile=:mobile,address=:address,pincode=:pincode,phone=:phone,country=:country,city=:city WHERE userID=:userID');
  $stmt->bindParam(':pincode',$pincode);
            $stmt->bindParam(':lastname',$lastname);
            $stmt->bindParam(':userID',$userID);
  $stmt->bindParam(':state',$state);
    $stmt->bindParam(':mobile',$mobile);
      $stmt->bindParam(':address',$address);
  $stmt->bindParam(':userName',$userName);

  $stmt->bindParam(':city',$city);
  $stmt->bindParam(':phone',$phone);
  $stmt->bindParam(':country',$country);
 

            if($stmt->execute()){
                ?>
                            <script>
                                alert('Successfully Updated ...');
                                window.location.href = 'profile.php';
                            </script>
                            <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }        
        }                         
    }    
?>
  <form action="" method="post" class="box">
                                          <input name="userID" type="hidden" value="<?php echo $custRow['userID']; ?>">                     








                                            <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>First Name</label>
                                                                            <input class="form-control" placeholder="Enter your username" name="userName" required="" type="text" value="<?php echo $custRow['userName']; ?>" autofocus="true">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6 ">
                                                                        <div class="form-group">
                                                                            <label>Last Name</label>
                                                                            <input class="form-control" placeholder="Enter your username" name="lastname" required="" type="text"  value="<?php echo $custRow['lastname']; ?>">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Email</label>
                                                                            <input class="form-control" placeholder="Enter your email address" name="userEmail" required="" type="email" value="  <?php echo $custRow['userEmail']; ?>" >
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Contact </label>
                                                                            <input class="form-control" id="mobile" placeholder="Enter Your Contact No" value=" <?php echo $custRow['mobile']; ?> "  name="mobile" required="" type="text">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Address </label>
                                                                            <input class="form-control" id="mobile" placeholder="House Number and Street Name" name="address" value=" <?php echo $custRow['address']; ?> " required="" type="text">
                                                                        </div>
                                                                    </div>



                                                                

                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label>City </label> 


  <input class="form-control" id="city" placeholder="City" name="city" value=" <?php echo $custRow['city']; ?> " required="" type="text">
                                                                        

                                                                           
                                                                        </div>
                                                                    </div>

                                                                      <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label>Postcode  </label>
                                                                            <input class="form-control" id="pincode" placeholder="Enter Your pincode" value="<?php echo $custRow['pincode']; ?>" name="pincode" required="" type="text">
                                                                        </div>
                                                                    </div>



                                                                   <div class="col-sm-4 ">
                                                                        <div class="form-group">
                                                                            <label>State</label>
                                                                            <input class="form-control" placeholder="Enter your State" name="state" required="" type="text"  value="<?php echo $custRow['state']; ?>">
                                                                        </div>
                                                                    </div>

                                                                       <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Country </label>
                                                                            <input class="form-control" id="country" placeholder="Enter Your Country " value=" India " name="country"  value="<?php echo $custRow['country']; ?>" required="" type="text">
                                                                        </div>
                                                                    </div>


                                                                       <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Alternate Contact No ( Optional ) </label>
                                                                            <input class="form-control" id="phone" placeholder="Enter Your Contact No" name="phone"  type="text" value="<?php echo $custRow['phone']; ?>">
                                                                        </div>
                                                                    </div>

                                                                   










                                                                <div class="form_content clearfix">

                                                                 


                                                                    <div class="col-sm-12">
                                                                        
  

    <input class="btn btn-primaryy orderBtn" type="submit" name="btn_save_updates" value="Update Profile" />
                                                                    </div>

                                                                </div>
  </form>



</div>
</div>


</div>
</div>
</div>
</div>









        </div>
      </div>
    </div>
  </section>  
  <?php include "footer.php"; ?>
</div>
<?php include "allscript.php"; ?>
?>
