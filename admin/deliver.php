<?php
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
       $order_query = mysqli_query($conn, "SELECT id,orders.cid,username,hostel,roomno,amount,deli_date,phoneno,total_products FROM orders,customers WHERE orders.cid=customers.cid AND orders.status=1");
       $num_results=mysqli_num_rows($order_query);
       if($num_results==0){
         echo "No Orders Found";
         return true;
       }
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

        </tr>
        </thead>
    " ;
       for($i=0;$i<$num_results;$i++){
        $row=mysqli_fetch_array($order_query);
    
        echo "<tbody>";
        echo "<tr>";
        echo "<td>".$row["username"]."</td>";
        echo "<td>".$row["hostel"]."</td>";
        echo "<td>".$row["roomno"]."</td>";
        echo "<td>".$row["amount"]."</td>";
        echo "<td>".$row["deli_date"]."</td>";
        echo "<td>".$row["total_products"]."</td>";
        echo "<td>".$row["phoneno"]."</td>";      
        echo"</tbody>";
       }
    
    echo "</div>";
   
    echo "</table>";

    ?>

</div>
</body>
</html>