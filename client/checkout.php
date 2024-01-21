<?php
session_start();
@include 'config.php';
$cid=$_SESSION["user"];
echo "$cid";
if(isset($_POST['order_btn'])){
   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE cid=$cid");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         foreach ($product_name as $key => $value) {
            echo $value."<br>";
         }
         $product_price =(int)($product_item['price'] * $product_item['quantity']);
         $price_total +=(int)$product_price;
     
      };
   };
     $cart_query = mysqli_query($conn,"SELECT * FROM `cart` WHERE cid=$cid");
   $date= date("Y-m-d");
   echo $date;
   $total_product = implode(', ',$product_name);
   echo $total_product;
   $detail_query = mysqli_query($conn, "INSERT INTO `orders`(cid,order_date,amount, total_products) VALUES('$cid','$date','$price_total','$total_product')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }
   $cart_query = mysqli_query($conn, "DELETE  FROM `cart` WHERE cid=$cid");


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE cid=$cid");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = (int)($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += (int)$total_price;
            
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : <?= $grand_total; ?>Ks </span>
   </div>

      <div class="flex">        
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>