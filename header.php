
<?php  
// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;

?>
 

<?php
error_reporting(0);

session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
// $user_home->redirect('login.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));



$row = $stmt->fetch(PDO::FETCH_ASSOC);

$con = mysqli_connect("localhost","root","","sadhaye5_motor") or die ('Unable to connect');


?>

   <header id="navbar-spy" class="header header-1">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-5">
                        <ul class="list-inline top-contact">
                            <li><span>Phone :</span> <a href="tel:+917977380678"> +91 79773 80678</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-7">
                        <ul class="list-inline pull-right top-links">
                          
                          <!--  <li>
                                <a href="checkout.php">Checkout</a>
                            </li> -->
                          

                          
                            <?php
                if(isset($_SESSION['userSession']))
                {
                 echo '  


                             <li class="dropdown"> 

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, '.$row['userName'].' <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
 <li>
                                <a href="profile.php">My Account</a>
                            </li> 

                             <li>
                                <a href="wishlist.php">My Wishlist</a>
                            </li>
                             <li>
                                <a href="history.php">My Order</a>
                            </li>
                                   
                                    

                                    <li>
                                        <a href="logout.php" > Sign Out</a> 
                                    </li>
                                </ul>
                            </li>           
 ';
}
                else{
echo '  <li>
                                <a href="login.php">Login</a> /
                                <a href="register.php">Register</a>
                            </li>';
                }?>

                        </ul>
                    </div>
                </div>
                
            </div>
          
        </div>
       
        <nav id="primary-menu" class="navbar navbar-fixed-top">
            <div class="container">
              
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="logo" href="index.php">
                        <img style="width:200px" src="assets/images/logo/logo.png" alt="Autoshop">
                    </a>
                </div>

               
                <div class="collapse navbar-collapse pull-right" id="header-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                       
                       
                     
                       
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="has-dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">shop</a>
                            <ul class="dropdown-menu">
<!-- MENU CODE --> 
<?php 
include "db.php";

function get_menu_tree($parent_id) 
{
    global $con;
    $menu = "";
    $sqlquery = " SELECT * FROM menu where status='1' and parent_id='" .$parent_id . "' ";
    $res=mysqli_query($con,$sqlquery);
    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) 
    { 

        $menu .= '<li class="dropdown-submenu"> <a href="shop.php?q='.$row['menu_id'].'">'.$row['menu_name'].'</a> ';

        $menu .=  '<ul class="dropdown-menu">'.get_menu_tree($row['menu_id']).'
                    </ul>'; 

        $menu .= '</li>';

    }

    return $menu;

}  

?>
<?php echo get_menu_tree(0); ?>
<!-- MENU CODE --> 
                            </ul>
                        </li>
                       
                        <li>
                            <a href="about.php">about</a>
                        </li>

                        <li>
                            <a href="contact.php">Contact</a>
                        </li>

                    </ul>

<!-- SEARCH CODE -->  



                           


                    <div class="module module-search pull-left">
                        <div class="search-icon">
                            <i class="fa fa-search"></i>
                            <span class="title">search</span>
                        </div>
                        <div class="search-box"> 


                             <?php
    ini_set('display_errors', 1);
    error_reporting(~0);
    $strKeyword = null;
    if(isset($_POST["txtKeyword"]))
    {
       $strKeyword = $_POST["txtKeyword"];
        
       // $strKeyword = str_replace(" ","+", $_POST["txtKeyword"]);
    }
?>  

   <form id="searchbox" name="frmSearch" method="post" action="searchresult.php" class="search-form">
                                <div class="input-group">
                                    <input  type="text" class="search_query form-control" placeholder="Type Your Search Words" name="txtKeyword" id="txtKeyword" value="<?php echo $strKeyword;?>">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default button-search" type="submit"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                              
                            </form>





<?php
   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "sadhaye5_motor";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
  


  $sql = "SELECT * FROM products WHERE productcode LIKE '%".$strKeyword."%' OR name LIKE '%".$strKeyword."%' OR price LIKE '%".$strKeyword."%' OR discount LIKE '%".$strKeyword."%' OR description LIKE '%".$strKeyword."%'  OR descr LIKE '%".$strKeyword."%'"; 
 

   $query = mysqli_query($conn,$sql);


?>

                         
                        </div>
                    </div>
<!-- SEARCH CODE --> 
                    <div class="module module-cart pull-left">
                        <div class="cart-icon">


                            

                            <i class="fa fa-shopping-cart"></i>
                            <span class="title">shop cart</span>
                            <span id="cartCount" class="cart-label"><?php echo $cart->total_items(); ?></span>
                        </div>
                        <div class="cart-box">
                            <div class="cart-overview">
                                <ul class="list-unstyled">



                                

                                        <script>
                                            function updateCartItem(obj, id) {
                                                $.get("cartAction.php", {
                                                    action: "updateCartItem",
                                                    id: id,
                                                    qty: obj.value
                                                }, function(data) {
                                                    if (data == 'ok') {
                                                        location.reload();
                                                    } else {
                                                        alert('Cart update failed, please try again.');
                                                    }
                                                });
                                            }
                                        </script>


                                            <?php
if ($cart->total_items() > 0) {
    //get cart items from session
    $cartItems = $cart->contents();
    foreach ($cartItems as $item) {
        echo ' 

        <li>
         <img class="img-responsive" src="images/products/'.$item["imagurl"].'" width="61px" height="60px" />
         <div class="product-meta">
            <h5 style="text-transform: capitalize;" class="product-title"> ' . substr($item['name'], 0, 40) . ".." . '</h5>
            <p class="product-price">Price:' . $item["price"] . '</p> 
            <p class="product-quantity">Quantity: '.$item["qty"].'</p>
         </div> 
        ';?>  

      

        <a class="cancel"  onclick="return confirm('Are you sure?')" <?php
        echo 'href="cartAction.php?action=removeCartItem&id='.$item["rowid"].'">cancel</a>
        </li>';
}
}
else {  '<p class="alert alert-danger">Your shopping cart is empty.</p>';
}
?> 
 </ul>
 <!-- CART CODE --> 

 
</ul>                            </div>

                            <div class="clearfix">
                            </div>
                            <div class="cart-control">
                                <a class="btn btn-primary btn-block" href="viewcart.php">view cart</a>
                                <!--<a class="btn btn-secondary btn-block" href="checkout.php">check out</a> -->
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </nav>
    </header> 