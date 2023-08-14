<?php
    include("config.php");
    
    require('connection.inc.php');
    require('functions.inc.php');
    require('add_to_cart.inc.php');

    $token = $_POST["stripeToken"];
    $token_card_type = $_POST["stripeTokenType"];
    $address = $_POST["addresss"];
    $city = $_POST["city"];
    $pincode        = $_POST["pincode"];
    $amount        = $_POST["cart_total"];

    
    
   $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","",$amount) * 100,
      "description" =>"Charge",
      "currency" => 'npr',
      "source"=> $token,
    ]);
  

    if($charge){

      $cart_total=0;

     
          // prx($_POST);
        
        $payment_type="Stripe";
        $user_id=$_SESSION['USER_ID'];
        foreach($_SESSION['cart'] as $key=>$val){
          $productArr=get_product($con,'','',$key);
          $price=$productArr[0]['price'];
          $qty=$val['qty'];
          $cart_total=$cart_total+($price*$qty);
          
        }
        $total_price=$cart_total;
        $payment_status='success';
        if($payment_type=='cod'){
          $payment_status='success';
        }
        $order_status='1';
        $added_on=date('Y-m-d h:i:s');
        
        mysqli_query($con,"insert into `order`(user_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price) values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price')");
        
        $order_id=mysqli_insert_id($con);
        
        foreach($_SESSION['cart'] as $key=>$val){
          $productArr=get_product($con,'','',$key);
          $price=$productArr[0]['price'];
          $qty=$val['qty'];
          
          mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
        }
        unset($_SESSION['cart']);

      header("Location:success.php?amount=$amount");
    }
   