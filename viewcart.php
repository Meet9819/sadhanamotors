    <?php include('allcss.php'); ?>
    <?php
        define("SHIPPING_CHARGE", 50);
    ?>
        
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 

-->


<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <script>
            function updateCartItem(obj,id){
                $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
                    if(data == 'ok'){
                        location.reload();
                    }   else{
                        alert('Cart update failed, please try again.');
                    }
                });
            }
        </script>
    
        
        
    </head>
    <body>
        <div id="wrapper" class="wrapper clearfix">
            <?php include('header.php'); ?> 
            
            <section id="page-title" class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <h1>shop cart</h1>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <ol class="breadcrumb text-right">
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="active">shop cart</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section id="shopcart" class="shop shop-cart">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12  col-sm-12  col-md-12">
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <table id="cart_summary" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="cart_product first_item">Product</th>
                                                <th class="cart_description item">Description</th>
                                                <th class="cart_unit item text-right">HSN Code</th>
                                                <th class="cart_unit item text-right">Unit price</th>
                                                <th class="cart_quantity item text-center">Qty</th>
                                                <th class="cart_delete last_item">&nbsp;</th>
                                                <th class="cart_total item text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $cart->total_items();
                                            
                                            if($cart->total_items() > 0){
                                                //get cart items from session
                                                // gross weight
                                                $gross_weight = 0;
                                                $cartItems = $cart->contents();
                                                
                                                foreach($cartItems as $item)    {
                                                    $gross_weight += ($item["weight"] * $item["qty"]);
                                            ?>
                                            <tr id="product_65_477_0_0" class="cart_item address_0 even">
                                                <td class="cart_product">
                                                    <a href="#"><img src="images/products/<?php echo $item["imagurl"]; ?>" width="80" height="80" /></a>
                                                </td>
                                                <td class="cart_description">
                                                    <h5 class="product-name">
                                                        <a href="#"><?php echo $item["name"]; ?></a>
                                                    </h5>
                                                    <small class="cart_ref">Product Code : <?php echo $item["productcode"]; ?></small><br>
                                                    <small class="cart_ref">Weight : <?php echo $item["weight"]; ?>KG </small>
                                                </td>
                                                <td class="cart_unit" data-title="Unit price">
                                                    <ul class="price text-right" id="product_price_65_477_0">
                                                        <li class="price special-price"><?php echo $item["hsncode"]; ?></li>
                                                    </ul>
                                                </td>
                                                <td class="cart_unit" data-title="Unit price">
                                                    <ul class="price text-right" id="product_price_65_477_0">
                                                        <li class="price special-price">₹<?php echo $item["price"]; ?></li>
                                                    </ul>
                                                </td>
                                                <td class="cart_quantity text-center" data-title="Quantity">
                                                    <input type="number" class="form-control text-center" minlenght="0" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')">
                                                </td>
                                                <td class="cart_delete text-center" data-title="Delete">
                                                    <div>
                                                        <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="cart_total" data-title="Total">
                                                    <span class="price" id="total_product_price_65_477_2">
                                                    ₹<?php echo $item["subtotal"]; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <?php
                                                    }
                                                }   else    { 
                                            ?>
                                            <tr>
                                                <td colspan="7">
                                                    <p class="alert alert-warning">Your shopping cart is empty.</p>
                                                </td>
                                            </tr>
                                            <?php 
                                                } 
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <?php  
                                                if($cart->total_items() > 0) { 
                                            ?>
                                            <tr class="cart_total_price">
                                                <td colspan="2" id="subtotal_final" class="cart_voucher"></td>
                                                <td colspan="3"  class="total_price_container text-right">
                                                    <span>Total</span>
                                                    <div id="hookDisplayProductPriceBlock-price"></div>
                                                </td>
                                                <td colspan="2" class="price" id="total_price_container" style="text-align: center;">
                                                    <?php
                                                        if($cart->total_items() > 0)  {
                                                    ?>
                                                    ₹<span id="total_price"><?php echo $cart->total(); ?></span>
                                                    <?php  } ?>
                                                </td>
                                            </tr>
                                            <tr class="cart_total_price">
                                                <td colspan="2" id="subtotal_final" class="cart_voucher"></td>
                                                <td colspan="3"  class="total_price_container text-right">
                                                    <span>
                                                        Gross Shipping Charges<br/>
                                                    </span>
                                                    <div id="hookDisplayProductPriceBlock-price"></div>
                                                </td>
                                                <td colspan="2" class="price" id="total_price_container" style="text-align: center;">
                                                    <?php
                                                        if($cart->total_items() > 0)  {
                                                            // gross shipping charges
                                                            $gross_shipping_charges = ceil(($gross_weight / 0.5)) * SHIPPING_CHARGE;
                                                    ?>
                                                    ₹<span id="total_price"><?php echo $gross_shipping_charges; ?></span> 
                                                    
                                                 <input type="hidden" name="shippingcharge" value="<?php echo $_SESSION["shipping_charges"]; ?>">
                                                 
                                                    <?php  
                                                            $_SESSION["shipping_charges"] = $gross_shipping_charges;   
                                                            
                                                          
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </table>
                            </div>
                            <div id="HOOK_SHOPPING_CART"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-4" >
                                        <p class="cart_navigation clearfix">
                                            <a href="index.php" class="button-exclusive btn btn-primary" title="Continue shopping">
                                                <i class="fa fa-chevron-left left"></i> Continue shopping
                                            </a>
                                        </p>
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4" style="text-align: right;">
                                        <a class="button btn btn-primary " type="submit" href="checkout.php">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
        <?php include('allscript.php'); ?> 
    </body>
</html>