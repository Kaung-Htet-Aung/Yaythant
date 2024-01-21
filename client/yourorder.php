<?php
session_start();
@include 'config.php';
$cid=$_SESSION["user"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" type="" href="../css/style.css">
     <link rel="stylesheet" type="" href="../css/list.css">
</head>
<body>
    <?php 
        if(isset($_GET['cancel'])){
            $id=$_GET['cancel'];
           echo $id;
            $select_cart = mysqli_query($conn, "DELETE FROM orders WHERE id='$id'")or die('query failed');
            header("Refresh:0");
           // $select_cart = mysqli_query($conn, "INSERT into delivered SET status=1 WHERE id=$id")or die('query failed');
        
        }
    ?>
    <?php  
       include('./header.php');
       $order_query = mysqli_query($conn, "SELECT id,username,hostel,roomno,amount,order_date,phoneno,total_products,status FROM orders,customers WHERE orders.cid=$cid AND orders.cid=customers.cid") or die("query fail");
      
       $num_results=mysqli_num_rows($order_query);
     echo " <div class='table-wrapper'>
    <table class='fl-table'>
        <thead>
        <tr>
            <th>NAME</th>
            <th>HOSTEL </th>
            <th>ROOM NUMBER</th>
            <th>AMOUNT</th>
            <th>DATE</th>
            <th>PRODUCTS</th>
            <th>PHONE NUMBER</th>
            <th>Action</th>
        </tr>
        </thead>
    " ;
       $close='">Cancel</button></a>';
       for($i=0;$i<$num_results;$i++){
        $row=mysqli_fetch_array($order_query);
        echo "<tbody>";
        echo "<tr>";
        echo "<td>".$row["username"]."</td>";
        echo "<td>".$row["hostel"]."</td>";
        echo "<td>".$row["roomno"]."</td>";
        echo "<td>".$row["amount"]."</td>";
        echo "<td>".$row["order_date"]."</td>";
        echo "<td>".$row["total_products"]."</td>";
        echo "<td>".$row["phoneno"]."</td>";
        if($row['status']==1){
             echo "<td><a href='#' >Done</a></td>";
        }
        if($row['status']==0){
            echo '<td><button style="background-color:pink;width:65px;border-radius:20px;"><a style="text-decoration:none;color:red" href="yourorder.php?cancel='.$row["id"].$close ;

        }
        echo"</tbody>";
       }
    
    echo "</div>";
    echo "</table>";
    ?>

</div>
</body>
</html>