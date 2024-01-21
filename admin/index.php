<?php
session_start();
if (!isset($_SESSION["admin"])) {
   header("Location: login.php");
       
}
@include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" type="" href="../css/list.css">
</head>
<body>
    <?php  
       include('./navbar.php');
       $order_query = mysqli_query($conn, "SELECT id,orders.cid,username,hostel,roomno,amount,order_date,phoneno,total_products FROM orders,customers WHERE orders.cid=customers.cid AND orders.status=0");
       $num_results=mysqli_num_rows($order_query);
       if($num_results==0){
         echo "No Orders Found";
         return true;
       }
     echo " <div class='table-wrapper'>
    
    <table class='fl-table'>
        <thead>
        <tr> 
            <th>NO</th>
            <th>NAME</th>
            <th>HOSTEL </th>
            <th>ROOM NUMBER</th>
            <th>AMOUNT</th>
            <th>DATE</th>
            <th>PRODUCTS</th>
            <th>PHONE NUMBER</th>
            <th>Status</th>
        </tr>
        </thead>
    " ;
    if(isset($_GET['deliver'])){
        $id=$_GET['deliver'];

       $deli_date=date("Y-m-d");
       // echo $id;
        $select_cart = mysqli_query($conn, "UPDATE orders SET status=1,deli_date='$deli_date' WHERE id='$id';")or die('query failed');
        header("Refresh:0");
       // $select_cart = mysqli_query($conn, "INSERT into delivered SET status=1 WHERE id=$id")or die('query failed');
    
    }
       for($i=0;$i<$num_results;$i++){
        $row=mysqli_fetch_array($order_query);
        $cid=$row['cid'];
        $id=$row['id'];
        $order_date=$row['order_date'];
        $price_total=$row["amount"];
        $total_product=$row["total_products"];
        $close='">Done</button></a>';
        echo "<tbody>";
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["username"]."</td>";
        echo "<td>".$row["hostel"]."</td>";
        echo "<td>".$row["roomno"]."</td>";
        echo "<td>".$row["amount"]."</td>";
        echo "<td>".$row["order_date"]."</td>";
        echo "<td>".$row["total_products"]."</td>";
        echo "<td>".$row["phoneno"]."</td>";
       
        echo '<td><button style="background-color:yellow"><a style="text-decoration:none;color:red" href="index.php?deliver='.$row["id"].$close ;
      
        echo '</td>';
      
        echo"</tbody>";
       }
    
    echo "</div>";
   
    echo "</table>";

    ?>

</div>
</body>
</html>