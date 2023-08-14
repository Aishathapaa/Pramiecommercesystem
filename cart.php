<?php 
require('top.php');
?>

 <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">shopping cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										if(isset($_SESSION['cart'])){
                                            
											foreach($_SESSION['cart'] as $key=>$val){
											$productArr=get_product($con,'','',$key);
											$pname=$productArr[0]['name'];
											$mrp=$productArr[0]['mrp'];
											$price=$productArr[0]['price'];
											$image=$productArr[0]['image'];
											$qty=$val['qty'];
											?>
											<tr>
												<td class="product-thumbnail"><a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"  /></a></td>
												<td class="product-name"><a href="#"><?php echo $pname?></a>
													<ul  class="pro__prize">
                                                        <li class="old__prize"><?php if($mrp>0){
                                                            echo '$'.$mrp;
                                                        }else{
                                                            echo '';
                                                        }?></li>
														<li>$<?php echo $price?></li>
													</ul>
												</td>
												<td class="product-price"><span class="amount"><?php echo $price?></span></td>
												<td class="product-quantity"><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" min="1"/>
												<br/><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update</a>
												</td>
												<td class="product-subtotal"><?php echo intval($qty) * intval($price); ?></td>
												<td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="icon-trash icons"></i></a></td>
											</tr>
											<?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="<?php echo SITE_PATH?>">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="<?php echo SITE_PATH?>paystripe.php">Pay Stripe</a>
                                        </div>
                                          <div class="buttons-cart checkout--btn">
                                          <a href="<?php echo SITE_PATH?>khalti.php">khalti</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="<?php echo SITE_PATH?>checkout.php">Cash on delivery</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        
			   <!-- <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
				   <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_91af64702e6845a18de024a9f0d47dee",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log({payload});

                    $.ajax({
                    type: 'POST',
                    url: 'save_order.php', // Replace with the actual PHP script URL
                    data: {
                        address:"Kathmandu",
                        city:"kathamndu",
                        pincode:"12334",
                        user_id:1,
                        payment_type:"Khalti"

                    },
                    success: function(response) {

                        console.log({response})
                        // Handle the response from the server
                      if(response){

                          window.location.href = 'thank_you.php'; // Redirect to thank_you.php
                      }
                    }
                    });
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }
    </script>	-->		
<?php require('footer.php')?>       