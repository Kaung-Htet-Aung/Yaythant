

<?php   
        @include 'config.php';
        if(isset($_POST['roho'])){
            $hostel=$_POST['hostel'];
            $roomno=$_POST['roomno'];
            $start=$_POST['start'];
            $end=$_POST['end'];
            if($start!==""&&$end!==""){
                $query = mysqli_query($conn, "SELECT SUM(amount) as total,hostel,roomno FROM `orders`,`customers` WHERE order_date BETWEEN '$start' AND '$end' AND hostel='$hostel'AND roomno='$roomno'AND status=1 AND orders.cid= customers.cid;")or die('query failed');;

            }
            if($start!==""&&$end==""){
                $query = mysqli_query($conn, "SELECT SUM(amount) as total,hostel,roomno FROM `orders`,`customers` WHERE order_date ='$start' AND hostel='$hostel'AND roomno='$roomno'AND status=1 AND orders.cid= customers.cid;")or die('query failed');;

            }
       
       
         if(mysqli_num_rows($query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($query)){
         ?>

        <script>
            
            alert(<?php echo (int)($fetch_cart['total']) ?>+"Ks");
            
        </script>
         <?php
       // echo $sub_total;
            };
         };
        }
       //  echo $grand_total;
?>
<?php   
        @include 'config.php';
        if(isset($_POST['hostelform'])){
            $hostel=$_POST['hostel'];
            $start=$_POST['start'];
            $end=$_POST['end'];
            if($start!==""&&$end!==""){
                $query = mysqli_query($conn, "SELECT SUM(amount) as total,hostel FROM `orders`,`customers` WHERE order_date BETWEEN '$start' AND '$end' AND hostel='$hostel'AND status=1 AND orders.cid= customers.cid;")or die('query failed');;

            }
            if($start!==""&&$end==""){
                $query = mysqli_query($conn, "SELECT SUM(amount) as total,hostel FROM `orders`,`customers` WHERE order_date ='$start' AND hostel='$hostel' AND status=1 AND orders.cid= customers.cid;")or die('query failed');;

            }
       
       
         if(mysqli_num_rows($query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($query)){
         ?>
          <script>
            
             alert(<?php echo (int)($fetch_cart['total']) ?>+"Ks");
             
         </script>
         <?php
       // echo $sub_total;
            };
         };
        }
       //  echo $grand_total;
?>
<?php   
        @include 'config.php';
        if(isset($_POST['date'])){
           
            $start=$_POST['start'];
            $end=$_POST['end'];
            if($start!==""&&$end!==""){
                $query = mysqli_query($conn, "SELECT SUM(amount) as total FROM `orders`,`customers` WHERE order_date BETWEEN '$start' AND '$end' AND status=1 AND orders.cid= customers.cid;")or die('query failed');;

            }
            if($start!==""&&$end==""){
                $query = mysqli_query($conn, "SELECT SUM(amount) as total FROM `orders`,`customers` WHERE order_date ='$start' AND status=1 AND orders.cid= customers.cid;")or die('query failed');;

            }
       
       
         if(mysqli_num_rows($query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($query)){
         ?>
         <script>
             alert(<?php echo (int)($fetch_cart['total']); ?>+"Ks");
         </script>
         <tr>
            <td style="margin-top:500px">Ks</td>
         </tr>
         <?php
       // echo $sub_total;
            };
         };
        }
       //  echo $grand_total;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.products .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 35rem);
   gap:1.5rem;
   justify-content: center;
}

.products .box-container .box{
   text-align: center;
   padding:2rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   border-radius: .5rem;
}

.products .box-container .box img{
   height: 25rem;
}

.products .box-container .box h3{
   margin:1rem 0;
   font-size: 2.5rem;
   color:var(--black);
}

.products .box-container .box .price{
   font-size: 2.5rem;
   color:var(--black);
}


    </style>
</head>
<body>
   
    <?php include('./navbar.php');?>
    <div style="max-width:1200px;margin:auto">
    <div style="display:flex">
    <section class="products"style=' margin:20px'>
    <div class="box-container">
     <div class="box" style="border:1px solid black"> 
      <form action="" method="POST">
           <input type="date" required name="start" id="" style='padding:10px;margin:10px'>
           <input type="date" name="end"  style='padding:10px;margin:10px'id=""> <br><br>
            hostel name:     <input type="text" name="hostel" required style='padding:10px' id="" placeholder="enter hostel name"> <br><br><br>
            room number:     <input type="number" name="roomno" required style='padding:10px' id="" placeholder="enter room number"> <br><br>
           <input type="submit" value="Calculate" name="roho"> 
      </form>
    </div>

    </div>
    </section>
    <section class="products"style='margin:20px'>
    <div class="box-container">
     <div class="box" style="border:1px solid black"> 
      <form action="" method="POST">
           <input type="date" name="start" required id="" style='padding:10px;margin:10px'>
           <input type="date" name="end"  style='padding:10px;margin:10px'id=""> <br><br>
           <input type="hidden" name=""> <br><br><br>
            hostel name:<input type="text" name="hostel"  style='padding:10px' id="" placeholder="enter hostel name"> <br><br><br>
           <input type="submit" value="Calculate" name="hostelform"> 
      </form>
    </div>

    </div>
    </div>
    <div style="display:flex"> 

    
    </section>
    <section class="products"style='margin:20px'>
    <div class="box-container">
     <div class="box" style="border:1px solid black"> 
      <form action="" method="POST">
           <input type="date" name="start" required id="" style='padding:10px;margin:10px'>
           <input type="date" name="end"  style='padding:10px;margin:10px'id=""> <br><br>
           <input type="hidden" name="hostel"  style='padding:10px' id="" placeholder="enter hostel name"> <br><br><br>
           <input type="hidden" name="roomno"  style='padding:10px' id="" placeholder="enter room number"> <br><br>
           <input type="submit" value="Calculate" name="date"> 
      </form>
    </div>

    </div>
    </section>
     
    </div>

</div>
</body>
</html>