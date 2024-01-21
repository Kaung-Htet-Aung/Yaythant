<?php
session_start();
session_destroy();
@include 'config.php';
if (isset($_SESSION["user"])) {
   $cid=$_SESSION['user'];
}else $cid=0;
$cart_query = mysqli_query($conn, "DELETE  FROM `cart` WHERE cid=$cid");

header("Location: index.php");
?>