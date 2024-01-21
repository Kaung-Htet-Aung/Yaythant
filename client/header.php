
<header class="header">

   <div class="flex">

      <a href="#" class="logo">Yay Thant</a>

      <nav class="navbar">
      <a href="index.php" id="h">Home</a>
         <a href="products.php" id="h">view products</a>
      
      </nav>

      <?php 
      require_once "database.php";
      if (isset($_SESSION["user"])) {
         $cid=$_SESSION['user'];
        
      }else {
         $cid=0;
      }

      //echo $cid;
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart` WHERE cid=$cid") or die('');
      $row_count = mysqli_num_rows($select_rows);
      if($cid>0){
       
         echo "<a href='yourorder.php'class='cart'>Your orders</a>";
         echo "<a href='cart.php' class='cart'><span>cart <span>$row_count</a>";
         echo "<a href='logout.php'class='cart'>Logout</a>";
      }
      if($cid<=0){
          echo "<a href='../login.php'class='cart'>Login</a>";
          echo "<a href='registration.php'class='cart'>Register</a>";
      }
     echo " <div id='menu-btn' class='fas fa-bars'></div>";

      ?>
   
 
   </div>

</header>