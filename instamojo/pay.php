<?php

include"db.php";
// INSERT

   
  $DB_HOST = 'localhost';
  $DB_USERNAME = 'root';
  $DB_PASSWORD = '';
  $DB_NAME = 'sadhaye5_motor';
  
  try{
    $db = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USERNAME,$DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
   

   $userID = $_POST['userID'];
   $lastname = $_POST['lastname'];
   $state = $_POST['state'];
   $pincode = $_POST['pincode'];
   $address = $_POST['address'];
   $country = $_POST['country'];


    
        if(!isset($errMSG))
        {
            $stmt = $db->prepare('UPDATE tbl_users SET lastname=:lastname,state=:state,address=:address,pincode=:pincode,country=:country WHERE userID=:userID');
    
            $stmt->bindParam(':pincode',$pincode);
            $stmt->bindParam(':lastname',$lastname);
            $stmt->bindParam(':userID',$userID);
            $stmt->bindParam(':state',$state);
       
            $stmt->bindParam(':address',$address);

            $stmt->bindParam(':country',$country);
 

            if($stmt->execute()){
                ?>
                            <script>
                               alert('Successfully Updated ...');
                              //  window.location.href = 'checkout.php';
                            </script>
                            <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }  
                 
        } 

include"db.php"; 


$name = $con->real_escape_string($_POST['name']);
$email = $con->real_escape_string($_POST['email']);
$phone = $con->real_escape_string($_POST['phone']);
$product_name = $con->real_escape_string($_POST['product_name']);
$product_price = $con->real_escape_string($_POST['product_price']);
$address = $con->real_escape_string($_POST['address']);
$productcode = $con->real_escape_string($_POST['productcode']);

$billno = $con->real_escape_string($_POST['billno']);

$created = $con->real_escape_string($_POST['created']);

$result = mysqli_query($con,"INSERT INTO payment (name,email,phone,product_name,product_price,address,productcode,billno,created) VALUES('$name','$email','$phone','$product_name','$product_price','$address','$productcode','$billno','$created')");
   

                ?>
                <script>
                alert('Thank You ...');
               
              //  window.location.href='thankyou.php';
                </script>
                <?php

?>



<?php 
$product_name = $_POST["product_name"];

$price = $_POST["product_price"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];

$billno = $_POST['billno'];

include 'src/instamojo.php';





// testing api  of occultgyan
$api = new Instamojo\Instamojo('test_19a8e38d0b83fd5e4eb50146a45', 'test_e9e623c8a85034c710a1eb2d539','https://test.instamojo.com/api/1.1/');

//$api = new Instamojo\Instamojo('6a7c413ce50225a17aaa2e94a573e684', '6bb483805c9e224e6ea1e652f937bc76','https://www.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $billno,
        "amount" => $price,
        "buyer_name" => $name,
        "phone" => $phone,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => "http://192.168.0.8:8080/sadhana/11/instamojo/thankyou.php",
        "webhook" => "http://192.168.0.8:8080/sadhana/11/instamojo/webhook.php"
        ));
    //print_r($response);

    $pay_ulr = $response['longurl'];
    
    //Redirect($response['longurl'],302); //Go to Payment page

    header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}     
  ?>