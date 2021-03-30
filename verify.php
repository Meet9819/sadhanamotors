<?php
require_once 'class.user.php';
$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
	$user->redirect('http://sadhanamotors.com/login.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	$id = base64_decode($_GET['id']);
	$code = $_GET['code'];
	
	$statusY = "Y";
	$statusN = "N";
	
	$stmt = $user->runQuery("SELECT userID,userStatus FROM tbl_users WHERE userID=:uID AND tokenCode=:code LIMIT 1");
	$stmt->execute(array(":uID"=>$id,":code"=>$code));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() > 0)
	{
		if($row['userStatus']==$statusN)
		{
			$stmt = $user->runQuery("UPDATE tbl_users SET userStatus=:status WHERE userID=:uID");
			$stmt->bindparam(":status",$statusY);
			$stmt->bindparam(":uID",$id);
			$stmt->execute();	

			$msg = " <center>
					<img style='width:300px' src='http://sadhanamotors.com/assets/images/logo/logo.png'/>		<br><br>
					 <p style='font-size:20px'> <strong>WoW !</strong>  Your Account is Now Activated
					  <br><br><a style='padding:10px;color:white;background-color:#e74047;text-decoration:none' href='index.php'>Login here</a></p>

			      </center>
			       ";	
		}
		else
		{
			$msg = "
		          <center>
			<img style='width:300px' src='http://sadhanamotors.com/assets/images/logo/logo.png'/>		<br><br>
					 <p style='font-size:20px'> <strong>Sorry !</strong>  Your Account is already Activated <br><br> <a style='padding:10px;color:white;background-color:#e74047;text-decoration:none' href='http://sadhanamotors.com/login.php'>Login here</a> </p>
			      </center>
			       ";
		}
	}
	else
	{
		$msg = "
		       <center>
			<img style='width:300px' src='http://sadhanamotors.com/assets/images/logo/logo.png'/>		<br><br>
			 <p style='font-size:20px'>  <strong>Sorry !</strong>  No Account Found <br><br> <a style='padding:10px;color:white;background-color:#e74047;text-decoration:none' href='http://sadhanamotors.com/login.php'>Login here</a></p>
			      </center>
			   ";
	}	
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Confirm Registration</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
		<?php if(isset($msg)) { echo $msg; } ?>
    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>