<?php

@include 'vintage_db.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];

   $method = $_POST['method'];
   $province = $_POST['province'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $barangay = $_POST['barangay'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   $product_name = [];
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = $product_item['price'] * $product_item['quantity'];
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `orders`(name, phone_number, method, province, city, barangay, street, total_products, total_price, order_status, payment_status) VALUES('$name','$number','$method','$province','$city','$barangay','$street','$total_product','$price_total', 1, 1)") or die(mysqli_error($conn));

   if($detail_query){
      // Clear the cart after successful order
      mysqli_query($conn, "TRUNCATE TABLE `cart`");
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'>Total: $".$price_total."/-</span>
         </div>
         <div class='customer-details'>
            <p>Your Name: <span>".$name."</span></p>
            <p>Your Number: <span>".$number."</span></p>
            <p>Your Email: <span>".$email."</span></p>
            <p>Your Address: <span>".$province.", ".$city.", ".$barangay.", ".$street."</span></p>
            <p>Your Payment Mode: <span>".$method."</span></p>
            <p>(*pay when product arrives*)</p>
         </div>
         <a href='products.php' class='btn'>Continue Shopping</a>
         </div>
      </div>
      ";
   } else {
      echo "Order placement failed. Please try again.";
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="vtgcart/shopping cart/css/style.css">

</head>
<body>

<?php include 'vtgcart/shopping cart/header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Complete Your Order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      } else {
         echo "<div class='display-order'><span>Your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total">Grand Total: $<?= $grand_total; ?>/-</span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Your Name</span>
            <input type="text" placeholder="Enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>Your Number</span>
            <input type="number" placeholder="Enter your number" name="number" required>
         </div>
         
         <div class="inputBox">
            <span>Payment Method</span>
            <select name="method">
               <option value="cash on delivery" selected>Cash on Delivery</option>
               <option value="credit card">Credit Card</option>
               <option value="paypal">Paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Province</span>
            <input type="text" placeholder="e.g. Maharashtra" name="province" required>
         </div>
         <div class="inputBox">
            <span>City</span>
            <input type="text" placeholder="e.g. Mumbai" name="city" required>
         </div>
         <div class="inputBox">
            <span>Barangay</span>
            <input type="text" placeholder="e.g. Poblacion" name="barangay" required>
         </div>
         <div class="inputBox">
            <span>Street</span>
            <input type="text" placeholder="e.g. Main Street" name="street" required>
         </div>
         
      </div>
      <input type="submit" value="Order Now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- Custom JavaScript file link -->
<script src="js/script.js"></script>
   
</body>
</html>
